<div>
    <form class="conteiner" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
        <!--Menu at Bottomn of every admin Page-->

        <div class="footerForm">
            <div>
                <div>   <!--Add Vehicle Button-->
                    <button class="button" type="submit" name="admin_edit" value="addVehicle" default='field'> Add New Vehicle</button>
                    <!--Add Make Button-->
                    <button class="button" type="submit" name="admin_edit" value="make">view/Edit Vehicle Make</button>
                </div>
                <div>
                    <!--Add Vehicle Type Button-->
                    <button class="button" type="submit" name="admin_edit" value="type">View/Edit Vehicle Types</button>
                    <!--Add Vehicle Class Button-->
                    <button class="button" type="submit" name="admin_edit" value="class">View/Edit Vehicle Classes</button>

                </div>
                <div>
                    <button class="adminHome button" type="submit" name="admin_edit" value="default">Admin Home</button>
                    <button class="adminHome button" type="submit" name="action" value="register">Register New Admin User</button>
        
                </div>

            </div>
            <!--Back To admin Home Button Button-->
       </div>
    </form>




    </body>
    <footer>
    </footer>

    </html>