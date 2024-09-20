

                        <div class="w3-black w3-center w3-padding-20 fixed-bottom" >Powered by Felipe Moreira</div>

                    <!-- End page content -->
                </div>
            </div>
        </div>

        <!-- Newsletter Modal -->
        <div id="newsletter" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
                <div class="w3-container w3-white w3-center">
                    <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
                    <h2 class="w3-wide">NEWSLETTER</h2>
                    <p>Join our mailing list to receive updates on new arrivals and special offers.</p>
                    <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
                    <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
                </div>
            </div>
        </div>

        <script>
            // Accordion 
            function w3_open() {
                document.getElementById("mySidebar").style.display = "block";
            }
 
            function w3_close() {
                document.getElementById("mySidebar").style.display = "none";
            }

            function smallscreen(){
                let smallscrenMenu = document.querySelector('.smallscreen-menu');
                if(smallscrenMenu.classList.contains('open')){
                    smallscrenMenu.classList.remove('open');
                }
                else{
                    smallscrenMenu.classList.add('open');
                }
            }
            var search = document.getElementById("pesquisar");

            search.addEventListener("keydown", function(event){
                if (event.key ==="Enter"){
                    searchData();
                }
            });
            function searchData(){
                window.location = "index.php?search="+search.value;
            }

            function confirmarOperacao() {
                return confirm("Deseja realmente excluir sua conta?");
            }

        </script>

    </body>
</html>
