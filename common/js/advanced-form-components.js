"use strict";
if (top.location != location) {
  top.location.href = document.location.href;
}
$(function () {
  "use strict";
  window.prettyPrint && prettyPrint();
  $(".default-date-picker").datepicker({
    format: "mm-dd-yyyy",
    language: langdate
  });
  $(".dpYears").datepicker();
  $(".dpMonths").datepicker();
  ("use strict");

  var startDate = new Date(2012, 1, 20);
  var endDate = new Date(2012, 1, 25);
  $(".dp4")
    .datepicker()
    .on("changeDate", function (ev) {
      if (ev.date.valueOf() > endDate.valueOf()) {
        $(".alert")
          .show()
          .find("strong")
          .text("The start date can not be greater then the end date");
      } else {
        $(".alert").hide();
        startDate = new Date(ev.date);
        $("#startDate").text($(".dp4").data("date"));
      }
      $(".dp4").datepicker("hide");
    });
  $(".dp5")
    .datepicker()
    .on("changeDate", function (ev) {
      if (ev.date.valueOf() < startDate.valueOf()) {
        $(".alert")
          .show()
          .find("strong")
          .text("The end date can not be less then the start date");
      } else {
        $(".alert").hide();
        endDate = new Date(ev.date);
        $(".endDate").text($(".dp5").data("date"));
      }
      $(".dp5").datepicker("hide");
    });

  // disabling dates
  ("use strict");
  var nowTemp = new Date();
  var now = new Date(
    nowTemp.getFullYear(),
    nowTemp.getMonth(),
    nowTemp.getDate(),
    0,
    0,
    0,
    0
  );

  var checkin = $(".dpd1")
    .datepicker({
      language: langdate,
      onRender: function (date) {
        "use strict";
        return date.valueOf() < now.valueOf() ? "disabled" : "";
      },
    })
    .on("changeDate", function (ev) {
      "use strict";
      if (ev.date.valueOf() > checkout.date.valueOf()) {
        var newDate = new Date(ev.date);
        newDate.setDate(newDate.getDate() + 1);
        checkout.setValue(newDate);
      }
      checkin.hide();
      $(".dpd2")[0].focus();
    })
    .data("datepicker");
  ("use strict");
  var checkout = $(".dpd2")
    .datepicker({
      language: langdate,
      onRender: function (date) {
        "use strict";
        return date.valueOf() <= checkin.date.valueOf() ? "disabled" : "";
      },
    })
    .on("changeDate", function (ev) {
      "use strict";
      checkout.hide();
    })
    .data("datepicker");
});

$(".form_datetime").datetimepicker({ format: "yyyy-mm-dd hh:ii" });

$(".form_datetime-component").datetimepicker({
  format: "dd MM yyyy - hh:ii",
});

$(".form_datetime-adv").datetimepicker({
  format: "dd MM yyyy - hh:ii",
  autoclose: true,
  todayBtn: true,
  startDate: "2013-02-14 10:00",
  minuteStep: 10,
});

$(".form_datetime-meridian").datetimepicker({
  format: "dd MM yyyy - HH:ii P",
  showMeridian: true,
  autoclose: true,
  todayBtn: true,
});

//datetime picker end

//timepicker start
$(".timepicker-default").timepicker({
    defaultTime: 'current',
    showMeridian: false,
});

$(".timepicker-24").timepicker({
  autoclose: true,
  minuteStep: 1,
  showSeconds: true,
  showMeridian: false,
});

//timepicker end

//colorpicker start

$(".colorpicker-default").colorpicker({
  format: "hex",
});
$(".colorpicker-rgba").colorpicker();

//colorpicker end

//multiselect start

$("#my_multi_select1").multiSelect();
$("#my_multi_select2").multiSelect({
  selectableOptgroup: true,
});

$("#my_multi_select3").multiSelect({
  selectableHeader:
    "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
  selectionHeader:
    "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
  afterInit: function (ms) {
    "use strict";
    var that = this,
      $selectableSearch = that.$selectableUl.prev(),
      $selectionSearch = that.$selectionUl.prev(),
      selectableSearchString =
        "#" +
        that.$container.attr("id") +
        " .ms-elem-selectable:not(.ms-selected)",
      selectionSearchString =
        "#" + that.$container.attr("id") + " .ms-elem-selection.ms-selected";

    that.qs1 = $selectableSearch
      .quicksearch(selectableSearchString)
      .on("keydown", function (e) {
        "use strict";
        if (e.which === 40) {
          that.$selectableUl.focus();
          return false;
        }
      });

    that.qs2 = $selectionSearch
      .quicksearch(selectionSearchString)
      .on("keydown", function (e) {
        "use strict";
        if (e.which == 40) {
          that.$selectionUl.focus();
          return false;
        }
      });
  },
  afterSelect: function () {
    this.qs1.cache();
    this.qs2.cache();
  },
  afterDeselect: function () {
    this.qs1.cache();
    this.qs2.cache();
  },
});

//multiselect end

//wysihtml5 start

$(".wysihtml5").wysihtml5();

//wysihtml5 end
