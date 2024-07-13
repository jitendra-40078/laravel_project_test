"use strict";

$(document).ready(function() {
  if( typeof isListPage  !== 'undefined' && isListPage  === '1' ){
    const tableColumns =  [
      {"targets": [0,1,2,3,4,5,6], "orderable": true},
      {"targets": [0], "width": 80},
      {"targets": [1,2], "width": 120},
      {"targets": [3,4,5], "width": 150},
      {"targets": [6], "width": 250}
    ];

    setDataTable("contactTable", tableColumns);
  }
});