"use strict";

$(document).ready(function() {
  if( typeof isListPage  !== 'undefined' && isListPage  === '1' ){
    const tableColumns =  [
      {"targets": [0,1,2,3,4], "orderable": true},
      {"targets": [5,6,7], "orderable": false},
      {"targets": [0], "width": 80},
      {"targets": [1,2], "width": 200},
      {"targets": [3], "width": 150},
      {"targets": [4], "width": 100},
      {"targets": [5,6,7], "width": 60}
    ];

    setDataTable("careerTable", tableColumns);
  }
});