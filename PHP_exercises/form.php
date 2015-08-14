

<form method="post" action='form.php' id="cakeform" >
    <div>
        <div class="cont_order">
            <fieldset>
                <legend>Make your cake!</legend>
                <div class='field_container'>
                    <label >Size Of the Cake</label>
                    <label class='radiolabel'><input type="radio"  name="selectedcake" value="Round6"  />Round cake 6" -  serves 8 people</label><br/>
                    <label class='radiolabel'><input type="radio"  name="selectedcake" value="Round8"  />Round cake 8" - serves 12 people</label><br/>
                    <label class='radiolabel'><input type="radio"  name="selectedcake" value="Round10"  />Round cake 10" - serves 16 people</label><br/>
                    <label class='radiolabel'><input type="radio"  name="selectedcake" value="Round12"  />Round cake 12" - serves 30 people</label><br/>
                </div>

                <div class='field_container'>
                    <label for="flavor">Select Flavor:</label >
                    <select id="flavor" name='flavor' >
                        <option value="">Select Flavor</option>
                        <option >Yellow</option>
                        <option >White</option>
                        <option >Chocolate</option>
                        <option >Combo</option>
                    </select>
                </div>
                <div class='field_container'>
                    <label >Fillings:</label>
                    <label><input type="checkbox" value="Lemon" name='Filling[]'  />Lemon</label>
                    <label><input type="checkbox" value="Custard" name='Filling[]'  />Custard</label>
                    <label><input type="checkbox" value="Fudge" name='Filling[]'  />Fudge</label>
                    <label><input type="checkbox" value="Mocha" name='Filling[]'  />Mocha</label>
                    <label><input type="checkbox" value="Raspberry" name='Filling[]'  />Raspberry</label>
                    <label><input type="checkbox" value="Pineapple" name='Filling[]'  />Pineapple</label>
                </div>
                <div class='field_container'>
                    <label class="inlinelabel"><input type="checkbox" id="agree" name='agree' /> I agree to the <a href="javascript:void(0);">terms and conditions</a></label>
                </div>
            </fieldset>
        </div>

        <div class="cont_details">
            <fieldset>
                <legend>Contact Details</legend>
                <label for='name'>Name</label>
                <input type="text" id="name" name='name' />
                <br/>
                <label for='address'>Address</label>
                <input type="text" id="address" name='address' />
                <br/>
                <label for='phonenumber'>Phone Number</label>
                <input type="text"  id="phonenumber" name='phonenumber'/>
                <br/>
            </fieldset>
        </div>
        <input type='submit' id='submit' value='Submit'  />
    </div>
</form>


<?php
    echo '<pre>'.print_r($_POST,true).'</pre>';

    $error_noti = null;
    $error = false;
    //$name = trim($_POST['name']);
    if(empty($_POST['name']))
    {
        $error_noti .=  " Please enter your name.";
        $error=true;
    }
    if(empty($_POST['selectedcake']))
    {
        $error_noti .= " Please select a cake size.";
        $error=true;
    }
    else
    {
        $selected_cake = $_POST['selectedcake'];
    }
    if(empty($_POST['flavor']))
    {
        $error_noti .=" Please select a flavor from the list.";
        $error=true;
    }
    else
    {
        $flavor = $_POST['flavor'];
    }
    if ($error) {
        echo $error_noti ;
        exit;
    }
    echo "Success";
?>