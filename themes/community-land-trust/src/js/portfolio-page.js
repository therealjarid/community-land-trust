jQuery(document).ready(function($) {
  $('.button-container button:first-of-type').addClass('selected');
  let queryString = '?_embed';
  getPosts(queryString);

  //@TODO:
  // 1. set 'all' as default - DONE
  // 2. REST call to fill grid with all portfolio types
  // 3. on button 'select' event, take in value and filter portfolio types with REST call

  async function getPosts(queryString) {
    try {
      // get portfolio posts from REST api
      const restResult = await $.ajax({
        beforeSend: xhr => xhr.setRequestHeader('X-WP-Nonce', apiVars.nonce),
        url: `${apiVars.restUrl}wp/v2/portfolio${queryString}`,
        method: 'GET'
      });
      console.log(restResult);
    } catch (e) {
      ajaxFail();
    }
  }

  function ajaxFail() {
    $('.error-message').addClass('ajax-error');
  }
});
