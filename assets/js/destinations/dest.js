
$(document).ready(function(){

    $("#destination").keydown(function(){
        let destination = $(this).val();
    
        $.ajax({
            url: "models/destinations/filter.php",
            method: "POST",
            data: {
                destination: destination
            },
            dataType: 'json',
            success: function(data){
                console.log(data);
                showDestinations(data);
            },
            error: function(error){
                console.log(error);
                console.log("ovde je greska");
            }
        })
    });
    
    
        $("#sort").change(function(){
            let sort = $(this).val();
    
            $.ajax({
                url: "models/destinations/sort_by_price.php",
                method: "POST",
                data: {
                    sort: sort
                },
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    showDestinations(data);
                },
                error: function(error){
                    console.log(error);
                    console.log("Greska ajax");
                }
            })
        });
    
    });
    
    
    function showDestinations(data){
        let html="";
        for(let d of data){
            html+=`<div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <a href="index.php?page=destination&id=${d.id}" class="unit-1 text-center">
              <img src="${d.picture}" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <strong class="text-primary mb-2 d-block">$${d.price}</strong>
                <h3 class="unit-1-heading">${d.name}</h3>
              </div>
            </a>
          </div>`;
        }
        $("#prikaz").html(html);
    }
    