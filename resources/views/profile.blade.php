@@ -582,24 +582,65 @@ function setLivePreviewFrameSize(srcEl) {
    $email = Auth::user()->email;
    $phone_number = Auth::user()->phone_number;
    
    // $age = 30;
    // $bio = "I am a web developer with a passion for programming.";
    

    // Function to display user profile
    function displayProfile($name, $email, $phone_number) {
        echo "<h2>Name: $name</h2>";
        echo "<p>Email: $email</p>";
        echo "<p>Phone: $phone_number</p>";
        // echo "<p>Age: $age</p>";
        // echo "<p>Bio: $bio</p>";
      
    }

    // Call the function to display the profile
    displayProfile($name, $email,$phone_number );
    ?>
    <!-- $age, $bio -->
  
    
    <!-- --------------------------------------------profile page--------------------------------------------------- -->
        
   
    <section >
      <div >
        <h1 >Profile</h1>
        <p>I'm a creative PHP webdeveloper</p>
        <div>
          <div >
            <div>
              <div >
                <div >
                  <h4 >About me</h4>
                  <p >I am an allround web developer. I am a senior programmer with good knowledge of front-end techniques. Vitae sapien pellentesque habitant morbi tristique senectus et. Aenean sed adipiscing diam donec adipiscing tristique risus.&nbsp;</p>
                  </p>
                </div>
              </div>
              <div >
                <div >
                  <img src="//images01.nicepage.com/c461c07a441a5d220e8feb1a/a07e7c23e17f56088bdb332d/cvv.jpg" alt="" class="u-image u-image-circle u-image-1" data-image-width="700" data-image-height="700">
                </div>
              </div>
              <div>
                <div >
                  <h4>Details</h4>
                  <p>
                    
                    <span style="font-weight: 700;">Name:id:'$name' </span>
                    <br >Hunter Norton<br>
                    <span style="font-weight: 700;">Age: </span>
                    <br>33 years <span style="font-weight: 700;">
                      <br>Location: 
                    </span>
                    <br>'s-Hertogenbosch, The Netherlands, Earth
                  </p>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

</body>
</html>
</html>

