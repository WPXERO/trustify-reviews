(function ($, elementor, CAROUSELObj) {
  ("use strict");
  const tabsSlick = function ($scope) {
    const yelpWrapper = $scope.find(".trustify-reviews");
    const tabs = $scope.find(".yelp-tabs");
    const tabsContent = $scope.find(".yelp-tabs-content");

    const settings = $(yelpWrapper).data("settings");

    if (!tabsContent.length) return;
    const fetchData = () => {
      $.ajax({
        url: CAROUSELObj.ajaxurl, // Replace with your API endpoint
        method: "POST",
        data: {
          action: "TRUSTIFY_REVIEWS", // Replace with your action name
          settings: settings,
          nonce: CAROUSELObj.nonce,
        },
        success: function (dataObj) {
          // If the API call was a success
          if (dataObj) {

            dataObj.forEach((review) => {
              const template = `
            <div class="yelp-slide-item">
              <div aria-hidden="true" class="agb-yelp__item">
                  <div class="yelp-items-inner">
                      <span class="yelp-info">
                          <span class="yelp-title">${review.profileTitle}</span>
                          <span class="yelp-subtitle">${review.text}</span>
                          <span class="yelp-reviews">
                              <span class="yelp-review-count">${review.value} star</span></span>
                          <span class="yelp-logo">
                              ${review.createdAt}
                    </div>
                  <button class="yelp-social-btn">
                  ${review.username}
                  </button>
              </div>
          </div>
            `;
              $(tabsContent).append(template);
              // }
            });
          }
        },
        error: function (error) {
          console.error("Error fetching data:", error);
        },
      });
    }


    // initial filter
    fetchData();

  }

  jQuery(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/trustify-reviews.default",
      tabsSlick
    );
  });
})(jQuery, window.elementorFrontend, window.TRUSTIFY_REVIEWSObj);
