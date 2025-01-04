<style>
 @media screen and (max-width: 500px) {
            .logo{
               margin: 0 140px; 
            }
            }
        
</style>
<div class="card container my-2">
     <div class="row " style="color: dodgerblue;">
         <div class="col-md-4 my-2">
             <img class="logo" src="./images/mvj.png" alt="logo" width=30%>
         </div>
         <div class="col-md-8">
             <div class="card-body text-center">

                 <h2 class="card-title font-w408">M.V.J College Of Engineering</h2>

                 <p class="card-text">Channsandra WhiteField Banglore karnataka 560067</p>
                 <h5>STUDENT FEEDBACK SYSTEM FOR TEACHER EVALUATION</h5>
                 <p class="card-text"><small class="text-muted">
                         <font color="red">
                             <?php
                                if (isset($_SESSION['log'])) {
                                    echo $_SESSION['log'];
                                } ?>
                         </font>
                     </small></p>
             </div>
         </div>
     </div>
 </div>