$(document).ready(function() {

    var base = $('#base_url').val();


    $('#app-table').DataTable({
//            "pageLength" : 5,
        "lengthMenu": [[4, 5, 10, 25, 36], [4, 5, 10, 25, 36]],
        "ajax" : {
            url: base + 'index.php/apps/apps_page' ,// url
            data: {'type':'apps'},
            type: "GET",
        },
        "order": [[ 5, "desc" ]],
        "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
            // Get the modal
            var modal = document.getElementById('myModal');

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");

            $(nRow.cells[2].firstChild).on("click", function(){
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            });

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
        },
    });



    $('#web-app-table').DataTable({
        "pageLength" : 5,
        "ajax" : {
            url: base + 'index.php/apps/apps_page' ,// url
            data: {'type':'web'},
            type: "GET",
        },
        "order": [[ 0, "desc" ]],
        "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
            // Get the modal
            var modal = document.getElementById('myModal');

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");

            $(nRow.cells[2].firstChild).on("click", function(){
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            });

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
        },
    });
});

