
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://www.mercadopago.com/v2/security.js" view="item"></script>
</head>

<body>
              <div class="">
                <h1>Product1 <span class="price">($1500)</span></h1>
                        <div class="formStyle">
                          <form action="php/paymentcheckout.php" method="POST"  onkeydown="return event.key != 'Enter';">

                                <div class="form-element form-input" >
                                    <input id="only-text" class="form-element-field" placeholder="Carlos" type="text" name="fname" required/>
                                    <div class="form-element-bar"></div>
                                    <label class="form-element-label" for="field-omv6eo-metm0n-5j55wv-w3wbws-6nm2b9">Name</label>
                                </div>

                                <div class="form-element form-input" >
                                    <input id="only-text2" class="form-element-field" placeholder="Perez" type="text" name="sname" required/>
                                    <div class="form-element-bar"></div>
                                    <label class="form-element-label" for="field-omv6eo-metm0n-5j55wv-w3wbws-6nm2b9">Surname</label>
                                </div>


                                <div class="form-element form-input">
                                    <input id="only-mail" class="form-element-field" placeholder="human@gmail.com" type="text" name="mail" required/>
                                    <div class="form-element-bar"></div>
                                    <label class="form-element-label" for="field-omv6eo-metm0n-5j55wv-w3wbws-6nm2b9">E-mail</label>
                                </div>


                                <div class="form-element form-input">
                                    <input id="only-phone" class="form-element-field" placeholder="01123231414" type="text" name="phone" required/>
                                    <div class="form-element-bar"></div>
                                    <label class="form-element-label" for="field-omv6eo-metm0n-5j55wv-w3wbws-6nm2b9">Phone </label>
                                </div>

                                <div class="form-element form-input">
                                    <input id="only-dni" class="form-element-field" placeholder="40.506.781" type="text" name="dni" required/>
                                    <div class="form-element-bar"></div>
                                    <label class="form-element-label" for="field-omv6eo-metm0n-5j55wv-w3wbws-6nm2b9">ID</label>
                                </div>

                                <select class="search-select" name="option">
                                  <option value="option1">Option 1</option>
                                  <option value="option2">Option 2</option>
                                  <option value="option3">Option 3</option>
                                </select>

                                <br>
                                    <script
                                    src="https://www.mercadopago.com.ar/integrations/v1/web-tokenize-checkout.js"
                                    data-public-key="YOURPUBLIC KEY"
                                    data-transaction-amount="1500.00" data-button-label="COMPRAR">
                                  </script>
                          </form>
                        </div>

              </div>

</body>
