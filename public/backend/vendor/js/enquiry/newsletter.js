"use strict";

$(document).ready(function() {
  if( typeof isListPage  !== 'undefined' && isListPage  === '1' ){
    const tableColumns =  [
      {"targets": [0,1], "orderable": true},
      {"targets": [0], "width": 100},
      {"targets": [1], "width": 250}
    ];

    setDataTable("newletterTable", tableColumns);
  }
});