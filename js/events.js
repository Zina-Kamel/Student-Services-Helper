    // create references to the modal...
    var modal = document.getElementById('myModal');
    // to all images -- note I'm using a class!
    var images = document.getElementsByClassName('img-grid');
    // modal image
    var mImg = document.getElementById("img01");
    // and the caption in the modal
    var captionText = document.getElementById("caption");

    // Go through all of the images with our custom class
    for (var i = 0; i < images.length; i++) {
      var img = images[i];
      // and attach our click listener for this image.
      img.onclick = function (evt) {
        
        modal.style.display = "block";
        mImg.src = this.src;
        captionText.innerHTML = this.alt;
      }
    }

    //click on x to close
    var span = document.getElementsByClassName("close")[0];

    span.onclick = function () {
      modal.style.display = "none";
    }


    //clock outside modal to close
    window.onclick = function(e) {
      if (e.target == modal) {
        modal.style.display = "none";
      }
    }