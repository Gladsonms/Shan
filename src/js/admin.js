$(document).ready(function(){
  $(".delete").click(function(){
    if (!confirm("Do you want to delete this item?")){
      return false;
    }
  });
});

$(document).ready(function(){
  $(".update").click(function(){
    if (!confirm("Do you want to update this item?")){
      return false;
    }
  });
});

$(document).ready(function(){
  $(".insert").click(function(){
    if (!confirm("Do you want to insert this item?")){
      return false;
    }
  });
});

//insert category
$("#insert-category").attr("novalidate", "");
$("#insert-category").validate();

//insert product
$("#insert-product").attr("novalidate", "");
$("#insert-product").validate();

//change password
$("#change-password").attr("novalidate", "");
$("#change-password").validate({
rules:{
  newpassword:{
    required: true,
    minlength: 6
  },
  confirm_password:{
    required: true,
    minlength: 6,
    equalTo: newpassword
  },
},
messages:{
  password:{
    required: "Please provide your password.",
    minlength: "Passwords must be at least 6 characters."
  },
  confirm_password:{
    required: "Please provide your password.",
    minlength: "Passwords must be at least 6 characters.",
    equalTo: "Please enter the same password as above"
  },
}
})

jQuery(function ($) {
    var performance = [12, 43, 34, 22, 12, 33, 4, 17, 22, 34, 54, 67],
        visits = [123, 323, 143, 132, 274, 223, 143, 156, 223, 223],
        budget = [23, 19, 11, 34, 42, 52, 35, 22, 37, 45, 55, 57],
        sales = [11, 9, 31, 34, 42, 52, 35, 22, 37, 45, 55, 57],
        targets = [17, 19, 5, 4, 62, 62, 75, 12, 47, 55, 65, 67],
        avrg = [117, 119, 95, 114, 162, 162, 175, 112, 147, 155, 265, 167];

    $("#shieldui-chart1").shieldChart({
        primaryHeader: {
            text: "Visitors"
        },
        exportOptions: {
            image: false,
            print: false
        },
        dataSeries: [{
            seriesType: "area",
            collectionAlias: "Q Data",
            data: performance
        }]
    });

    $("#shieldui-chart2").shieldChart({
        primaryHeader: {
            text: "Login Data"
        },
        exportOptions: {
            image: false,
            print: false
        },
        dataSeries: [
            {
                seriesType: "polarbar",
                collectionAlias: "Logins",
                data: visits
            },
            {
                seriesType: "polarbar",
                collectionAlias: "Avg Visit Duration",
                data: avrg
            }
        ]
    });

    $("#shieldui-chart3").shieldChart({
        primaryHeader: {
            text: "Sales Data"
        },
        dataSeries: [
            {
                seriesType: "bar",
                collectionAlias: "Budget",
                data: budget
            },
            {
                seriesType: "bar",
                collectionAlias: "Sales",
                data: sales
            },
            {
                seriesType: "spline",
                collectionAlias: "Targets",
                data: targets
            }
        ]
    });

    $("#shieldui-grid1").shieldGrid({
        dataSource: {
            data: gridData
        },
        sorting: {
            multiple: true
        },
        paging: {
            pageSize: 7,
            pageLinksCount: 4
        },
        selection: {
            type: "row",
            multiple: true,
            toggle: false
        },
        columns: [
            { field: "id", width: "70px", title: "ID" },
            { field: "name", title: "Person Name" },
            { field: "company", title: "Company Name" },
            { field: "email", title: "Email Address", width: "270px" }
        ]
    });
});
