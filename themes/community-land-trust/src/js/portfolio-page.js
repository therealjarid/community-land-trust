jQuery(document).ready(function($) {
  // get all posts, id="0", on start; the 'All' button has class 'selected' by default
  let templateUrl = String($('.all').attr('data-url'));
  getPosts(0);

  $('.button-container button').click(async function() {
    // remove error if previous ajax call created one
    $('.error-message').removeClass('ajax-error');
    // clear all buttons of 'selected' class then add to current one pressed
    $('.button-container button').removeClass('selected');
    $(this).addClass('selected');

    // id from button will let us filter the taxonomy in the REST call
    let termId = String($(this).attr('id'));

    getPosts(termId);
  });

  async function getPosts(termId) {
    try {
      // check if we need to filter the taxonomy, here we need 'var' to hoist the variable
      var queryString;
      if (termId != '0') {
        queryString = `?portfolio_type=${termId}&_embed`;
      } else {
        queryString = '?_embed';
      }

      // clear the grid container from previous call
      $('.portfolio-grid-container').empty();
      $('.loading').show();

      // get portfolio posts from REST api
      const restResult = await $.ajax({
        beforeSend: xhr => xhr.setRequestHeader('X-WP-Nonce', apiVars.nonce),
        url: `${apiVars.restUrl}wp/v2/portfolio${queryString}`,
        method: 'GET'
      });

      let propertyImage = `${templateUrl}/assets/images/icons/home-solid.svg`;
      $('.loading').hide();

      for (let i = 0; i < restResult.length; i++) {
        // check if property has image
        if (typeof restResult[i]._embedded != 'undefined') {
          if (
            typeof restResult[i]._embedded['wp:featuredmedia'] != 'undefined'
          ) {
            if (
              typeof restResult[i]._embedded['wp:featuredmedia'][0]
                .media_details.sizes.medium_large != 'undefined'
            ) {
              console.log('hey');
              propertyImage =
                restResult[i]._embedded['wp:featuredmedia'][0].media_details
                  .sizes.medium_large.source_url;
            } else if (
              typeof restResult[i]._embedded['wp:featuredmedia'][0]
                .media_details.sizes.medium != 'undefined'
            ) {
              propertyImage =
                restResult[i]._embedded['wp:featuredmedia'][0].media_details
                  .sizes.medium.source_url;
            } else {
              propertyImage = '';
            }
          }
        } else {
          propertyImage = '';
        }

        $('.portfolio-grid-container').append(
          `<a href="${restResult[i].link}">
              <div class="portfolio-grid-item">
                <div class="img-container" >
                  <img src="${propertyImage}">
                </div>
                <div class="title-container">
                  <p>${restResult[i].title.rendered}</p>
                </div>
              </div>
            </a>`
        );
      }
    } catch (e) {
      ajaxFail();
    }
  }

  function ajaxFail() {
    $('.error-message').addClass('ajax-error');
    $('.loading').hide();
  }
});
