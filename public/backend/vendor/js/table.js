let table;

function setDataTable(
  tableName,
  // paging,
  // scrollX,
  // scrollY,
  // processing,
  // serverside,
  // recordRoute,
  // filterData,
  columns,
  // recordsPerPage
){
  table = $(`#${tableName}`).DataTable({ 
    // "paging": paging,
    // "scrollX": scrollX,
    // "scrollY": scrollY,
    // "processing": processing, 
    // "serverSide": serverside,
    pageLength: 25,
    order: [], 
    // "ajax": {
    //   "url": CI_ROOT + recordRoute,
    //   "type": "POST",
    //   "data": filterData
    // },
    // dom: 'Bfrtip',
    // buttons: [],
    stateSave: false,
    columnDefs: columns
  });

  return table;
}

// var info = table.page.info();
// table.state.clear();