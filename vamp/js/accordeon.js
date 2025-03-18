//Accordeon

var acc = document.getElementsByClassName("accordion");
var i;
if (acc.length > 0) {
// Open the first accordion
var firstAccordion = acc[0];
var firstPanel = firstAccordion.nextElementSibling;
firstAccordion.classList.add("active");
firstPanel.style.maxHeight = firstPanel.scrollHeight + "px";

// Add onclick listener to every accordion element
for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    // For toggling purposes detect if the clicked section is already "active"
    var isActive = this.classList.contains("active");

    // Close all accordions
    var allAccordions = document.getElementsByClassName("accordion");
    for (j = 0; j < allAccordions.length; j++) {
      // Remove active class from section header
      allAccordions[j].classList.remove("active");

      // Remove the max-height class from the panel to close it
      var panel = allAccordions[j].nextElementSibling;
      var maxHeightValue = getStyle(panel, "maxHeight");
    
    if (maxHeightValue !== "0px") {
        panel.style.maxHeight = null;
      }
    }

    // Toggle the clicked section using a ternary operator
    isActive ? this.classList.remove("active") : this.classList.add("active");

    // Toggle the panel element
    var panel = this.nextElementSibling;
    var maxHeightValue = getStyle(panel, "maxHeight");
    
    if (maxHeightValue !== "0px") {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  };
}


function getStyle(el, styleProp) {
var value, defaultView = (el.ownerDocument || document).defaultView;

if (defaultView && defaultView.getComputedStyle) {
 
  styleProp = styleProp.replace(/([A-Z])/g, "-$1").toLowerCase();
  return defaultView.getComputedStyle(el, null).getPropertyValue(styleProp);
} else if (el.currentStyle) { 
  
  styleProp = styleProp.replace(/\-(\w)/g, function(str, letter) {
    return letter.toUpperCase();
  });
  value = el.currentStyle[styleProp];
 
  if (/^\d+(em|pt|%|ex)?$/i.test(value)) { 
    return (function(value) {
      var oldLeft = el.style.left, oldRsLeft = el.runtimeStyle.left;
      el.runtimeStyle.left = el.currentStyle.left;
      el.style.left = value || 0;
      value = el.style.pixelLeft + "px";
      el.style.left = oldLeft;
      el.runtimeStyle.left = oldRsLeft;
      return value;
    })(value);
  }
  return value;
}
}
}

document.addEventListener("DOMContentLoaded", function() {
  // ----- RANK MATH FAQ ACCORDION  -----
  var faqQuestions = document.getElementsByClassName("rank-math-question");
  var i;
  if (faqQuestions.length > 0) {
    // Optionally open the first question by default
    var firstFaq = faqQuestions[0];
    var firstFaqPanel = firstFaq.nextElementSibling;
    firstFaq.classList.add("active");
    firstFaqPanel.style.maxHeight = firstFaqPanel.scrollHeight + "px";

    for (i = 0; i < faqQuestions.length; i++) {
      faqQuestions[i].onclick = function() {
        var isActive = this.classList.contains("active");

        // Close all
        for (var j = 0; j < faqQuestions.length; j++) {
          faqQuestions[j].classList.remove("active");
          var panel = faqQuestions[j].nextElementSibling;
          if (getStyle(panel, "maxHeight") !== "0px") {
            panel.style.maxHeight = null;
          }
        }

        // Toggle the clicked one
        if (!isActive) {
          this.classList.add("active");
          var panel = this.nextElementSibling;
          panel.style.maxHeight = panel.scrollHeight + "px";
        }
      };
    }
  }

  // Reuse the same getStyle function
  function getStyle(el, styleProp) {
    var value, defaultView = (el.ownerDocument || document).defaultView;
    if (defaultView && defaultView.getComputedStyle) {
      styleProp = styleProp.replace(/([A-Z])/g, "-$1").toLowerCase();
      return defaultView.getComputedStyle(el, null).getPropertyValue(styleProp);
    } else if (el.currentStyle) {
      styleProp = styleProp.replace(/\-(\w)/g, function(str, letter) {
        return letter.toUpperCase();
      });
      value = el.currentStyle[styleProp];
      if (/^\d+(em|pt|%|ex)?$/i.test(value)) {
        return (function(value) {
          var oldLeft = el.style.left, oldRsLeft = el.runtimeStyle.left;
          el.runtimeStyle.left = el.currentStyle.left;
          el.style.left = value || 0;
          value = el.style.pixelLeft + "px";
          el.style.left = oldLeft;
          el.runtimeStyle.left = oldRsLeft;
          return value;
        })(value);
      }
      return value;
    }
  }
});




