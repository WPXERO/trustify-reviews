(function ($, elementor, TRUSTIFYObj) {
  ("use strict");
  const trustifyReviewsGrid = function ($scope) {
    const trustifyContent = $scope.find(".trustify-reviews-grid");
    const settings = $(trustifyContent).data("settings");
    if (!trustifyContent.length) return;

    const  formatTimeAgo = (timestamp) => {
      const date = new Date(timestamp);
      const now = new Date();
      const timeDifference = now - date;
      const seconds = Math.floor(timeDifference / 1000);
      const minutes = Math.floor(seconds / 60);
      const hours = Math.floor(minutes / 60);
      const days = Math.floor(hours / 24);
      const weeks = Math.floor(days / 7);
      const months = Math.floor(days / 30);
      const years = Math.floor(days / 365);

      if (years > 0) {
        return `${years} ${years === 1 ? "year" : "years"} ago`;
      } else if (months > 0) {
        return `${months} ${months === 1 ? "month" : "months"} ago`;
      } else if (weeks > 0) {
        return `${weeks} ${weeks === 1 ? "week" : "weeks"} ago`;
      } else if (days > 0) {
        return `${days} ${days === 1 ? "day" : "days"} ago`;
      } else if (hours > 0) {
        return `${hours} ${hours === 1 ? "hour" : "hours"} ago`;
      } else if (minutes > 0) {
        return `${minutes} ${minutes === 1 ? "minute" : "minutes"} ago`;
      } else {
        return "Just now";
      }
    }


    const fetchData = () => {
      $.ajax({
        url: TRUSTIFYObj.ajaxurl, // Replace with your API endpoint
        method: "POST",
        data: {
          action: "TRUSTIFY_REVIEWS", // Replace with your action name
          settings: settings,
          nonce: TRUSTIFYObj.nonce,
        },
        success: function (dataObj) {
          // If the API call was a success
          if (dataObj) {

            dataObj.forEach((review, index) => {
              const pulishedDate = formatTimeAgo(review.createdAt);
              let status = '';
                if(review.username === "") {
                  review.username = "Anonymous";
                }

                const rating = review.value * 20;
                const totalWords = review.text.split(' ').length;
                if(totalWords <= 18) {
                   status = 'short'
                }else if(totalWords >= 19 && totalWords < 50) {
                  status = 'medium'
                }
                else{
                  status = 'long'
                }


                let reviewStatus = '';

                if(rating >= 80) {
                  reviewStatus = 'Excellent';
                }else if(rating >= 60 && rating < 80) {
                  reviewStatus = 'Good';
                }else if(rating >= 40 && rating < 60) {
                  reviewStatus = 'Average';
                }else if(rating >= 20 && rating < 40) {
                  reviewStatus = 'Poor';
                }else if(rating >= 0 && rating < 20) {
                  reviewStatus = 'Bad';
                }



            const template = `
              <div class="trustify-reviews-item ${status}">
                <div class="trustify-reviews-heading">
                    <span><strong>${reviewStatus} ${rating / 10}/10</strong></span>
                </div>
                <div class="trustify-reviews-content">
                    <h3 class="trustify-reviews-title">
                        <a href="javascript:void(0);" target="_self" title="Shopping Bag">by ${review.username}</a>
                    </h3>
                    <div class="trustify-reviews-desc">
                        <p>${review.text}</p>
                    </div>
                </div>
                <div class="trustify-reviews-footer">
                    <div class="trustify-reviews-date">Posted ${pulishedDate}</div>
                    <div class="trustify-reviews-star">
                    <span class="star-rating stars-${rating}">★★★★★</span>
                    </div>
                </div>
            </div>
            `;
              $(trustifyContent).append(template);
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
      "frontend/element_ready/trustify-reviews-grid.default",
      trustifyReviewsGrid
    );
  });
})(jQuery, window.elementorFrontend, window.TRUSTIFY_REVIEWSObj);
