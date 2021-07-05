/**
 * @author [harontaiko]
 * @email [harontaiko@gmail.com]
 * @create date 2021-04-30 04:18:24
 * @modify date 2021-04-30 04:18:24
 * @desc [MARKUP BASED JAVASCRIPT, BASED ON PAUL IRISH'S DOM INTRUBUSIVE JS]
 */
/**MARKUP BASED JAVASCRIPT, BASED ON PAUL IRISH'S DOM INTRUBUSIVE JS */
var hostUrl = document.querySelector("link[rel='host']").getAttribute("href");
UTIL = {
  fire: function (func, funcname, args) {
    var namespace = mobilereport;

    funcname = funcname === undefined ? "init" : funcname;
    if (
      func !== "" &&
      namespace[func] &&
      typeof namespace[func][funcname] == "function"
    ) {
      namespace[func][funcname](args);
    }
  },

  loadEvents: function () {
    var bodyId = document.body.id;

    // hit up common first.
    UTIL.fire("common");

    // do all the classes too.
    $.each(document.body.className.split(/\s+/), function (i, classnm) {
      UTIL.fire(classnm);
      UTIL.fire(classnm, bodyId);
    });

    UTIL.fire("common", "finalize");
  },
};

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#product-avatar").attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

function sleep(time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}

function FilterInventory() {
  //JS table filter
  (function (document) {
    "use strict";

    var LightTableFilter = (function (Arr) {
      var _input;

      function _onInputEvent(e) {
        _input = e.target;
        var tables = document.getElementsByClassName(
          _input.getAttribute("data-table")
        );
        Arr.forEach.call(tables, function (table) {
          Arr.forEach.call(table.tBodies, function (tbody) {
            Arr.forEach.call(tbody.rows, _filter);
          });
        });
      }

      function _filter(row) {
        var text = row.textContent.toLowerCase(),
          val = _input.value.toLowerCase();
        row.style.display = text.indexOf(val) === -1 ? "none" : "table-row";
      }

      return {
        init: function () {
          var inputs = document.getElementsByClassName("light-table-filter");
          Arr.forEach.call(inputs, function (input) {
            input.oninput = _onInputEvent;
          });
        },
      };
    })(Array.prototype);

    document.addEventListener("readystatechange", function () {
      if (document.readyState === "complete") {
        LightTableFilter.init();
      }
    });
  })(document);
  //Filter Table
}

// kick it all off here
$(document).ready(UTIL.loadEvents);

function ToggleMenu() {
  $(function () {
    $("#fullPage").click(function () {
      $("#rightWrapper").toggleClass("full-page");
      $("#header").toggleClass("full-page");
      $(".top-logo").toggleClass("hide");
    });
  });

  $(function () {
    $("#listView li").click(function () {
      if ($("#listView li").hasClass("list-item-active")) {
        $("#listView li").removeClass("list-item-active");
      }
      $(this).addClass("list-item-active");
    });
  });
}

function outsideClick(event, notelem) {
  notelem = $(notelem); // jquerize (optional)
  // check outside click for multiple elements
  var clickedOut = true,
    i,
    len = notelem.length;
  for (i = 0; i < len; i++) {
    if (event.target == notelem[i] || notelem[i].contains(event.target)) {
      clickedOut = false;
    }
  }
  if (clickedOut) return true;
  else return false;
}

function daysRepo(selectId, hostpageClass, hostpageName) {
  var daysoptions = document.getElementById(`${selectId}`);

  daysoptions.addEventListener("change", function loadrepo() {
    currentOption = daysoptions.value;
    currentOptionText = this.options[this.selectedIndex].value;
    if (currentOptionText === "today") {
      //refocus page
      $(`${hostpageClass}`).animate({ opacity: 0 }, 1000);
      $(`${hostpageClass}`).animate({ opacity: 1 }, 1000);
      sleep(4700).then(() => {
        $(`${hostpageClass}`).animate({ opacity: 0 }, 0);
        $(`${hostpageClass}`).animate({ opacity: 1 }, 0);
      });
    } else {
      location.replace(
        `${hostUrl}/pages/daysrepo/${hostpageName}/${currentOptionText}`
      );
    }
  });
}

function datesRepo(triggerId, date1Id, date2Id, pageName) {
  document.getElementById(`${triggerId}`).addEventListener("click", () => {
    //validate dates
    var date1 = document.getElementById(`${date1Id}`);
    var date2 = document.getElementById(`${date2Id}`);
    if (date1.value !== "" && date2.value !== "") {
      //submit
      location.replace(
        `${hostUrl}/pages/date/${pageName}/${date1.value}/${date2.value}`
      );
    } else {
      date1.style.border = "2px solid red";
      date1.style.outline = "none";
      date2.style.border = "2px solid red";
      date2.style.outline = "none";
      sleep(2500).then(() => {
        date1.style.border = "";
        date1.style.outline = "";
        date2.style.border = "";
        date2.style.outline = "";
      });
    }
  });
}

//BEGIN EXECUTION HERE BASED ON PAGE
mobilereport = {
  __home: {
    init: function _homepage() {
      if (document.getElementById("anime").value != "") {
        //show animation
        $(".preloader-wrapper").delay(3).fadeIn();
        sleep(3500).then(() => {
          $(".preloader-wrapper").delay(350).fadeOut("slow");
          $("body").delay(350).css({ overflow: "visible" });
        });
      } else {
        document.querySelector(".preloader-wrapper").style.display = "none";
      }
      ToggleMenu();
      //yesterday report, 4 today, refocus page
      daysRepo("run", ".home", "home");
    },
  },
  __movie: {
    init: function _movie() {
      ToggleMenu();
      daysRepo("run", ".movie", "movie");
      datesRepo("filter-movie", "from", "to", "movie");
    },
  },
  __cyber: {
    init: function _cyber() {
      ToggleMenu();
      daysRepo("run", ".cyber", "cyber");
      datesRepo("filter-cyber", "from", "to", "cyber");
    },
  },
  __net: {
    init: function _net() {
      ToggleMenu();
      daysRepo("run", ".net", "net");
      datesRepo("filter-net", "from", "to", "net");
    },
  },
  __sales: {
    init: function _sales() {
      ToggleMenu();
      daysRepo("run", ".sales", "sales");
      datesRepo("filter-sales", "from", "to", "sales");
    },
  },
  __expense: {
    init: function _expense() {
      ToggleMenu();
      daysRepo("run", ".expense", "expense");
      datesRepo("filter-expense", "from", "to", "expense");
    },
  },
  __ps: {
    init: function _ps() {
      ToggleMenu();
      daysRepo("run", ".ps", "ps");
      datesRepo("filter-ps", "from", "to", "ps");
    },
  },
  __date: {
    init: function _date() {
      ToggleMenu();
      var backlink = document.getElementById("back-link");
      var currentpage = document.getElementById("cr-page").value;
      if (currentpage === "home") {
        backlink.href = `${hostUrl}/pages/index`;
      } else if (currentpage === "movie") {
        backlink.href = `${hostUrl}/pages/movieshop`;
      } else if (currentpage === "ps") {
        backlink.href = `${hostUrl}/pages/ps`;
      } else if (currentpage === "cyber") {
        backlink.href = `${hostUrl}/pages/cyber`;
      } else if (currentpage === "expense") {
        backlink.href = `${hostUrl}/pages/expenses`;
      } else if (currentpage === "sales") {
        backlink.href = `${hostUrl}/pages/sales`;
      } else if (currentpage === "net") {
        backlink.href = `${hostUrl}/pages/net`;
      }
    },
  },
  __daysrepo: {
    init: function _ps() {
      ToggleMenu();
      var lastpage = document.getElementById("last-page").value;

      var daysoptions = document.getElementById(`run`);

      daysoptions.addEventListener("change", function loadrepo() {
        currentOption = daysoptions.value;
        currentOptionText = this.options[this.selectedIndex].value;
        if (lastpage === "home") {
          location.replace(`${hostUrl}/pages/index`);
        } else if (lastpage === "movie") {
          datesRepo("filter-movie", "from", "to", "movie");
          location.replace(`${hostUrl}/pages/movieshop`);
        } else if (lastpage === "ps") {
          datesRepo("filter-ps", "from", "to", "ps");
          location.replace(`${hostUrl}/pages/ps`);
        } else if (lastpage === "cyber") {
          datesRepo("filter-cyber", "from", "to", "cyber");
          location.replace(`${hostUrl}/pages/cyber`);
        } else if (lastpage === "expense") {
          location.replace(`${hostUrl}/pages/expenses`);
          datesRepo("filter-expense", "from", "to", "expense");
        } else if (lastpage === "sales") {
          datesRepo("filter-sales", "from", "to", "sales");
          location.replace(`${hostUrl}/pages/sales`);
        } else if (lastpage === "net") {
          datesRepo("filter-net", "from", "to", "net");
          location.replace(`${hostUrl}/pages/net`);
        }
      });
    },
  },
  __login: {
    init: function _login() {
      //disable password pasting
      const pasteBox = document.getElementById("login-pwd");
      pasteBox.onpaste = (e) => {
        e.preventDefault();
        return false;
      };
      $(".message a").click(function () {
        $("form").animate({ height: "toggle", opacity: "toggle" }, "slow");
      });
    },
  },
};
