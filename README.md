# MercadoPagoForm

Hola! este es un formulario súper básico en PHP el cual integra el Checkout Pro de MercadoPago. En mi proyeto inicial, tuve problemas para enviar información
por e-mail a mi cliente luego de que se efectuara el pago, por lo que lo pude solucionar con esta porción de código y quería compartirlo. 

Es importante que instalen tanto la SDK de MercadoPago como PHPMailer para que funcione, pueden usar el código brindado como referencia. 

Por otro lado, esto es solo compatible para pagos con tarjeta de débito / crédito, no es posible integrar la billetera electrónica de MercadoPago
(Ya lo consulté t.t) 

Los fields están sanitizados en PHP pero es importante que agreguen sus propias validaciones y mensajes de error en cuanto a las validaciones, yo lo hice tanto en client side con JQuery como en server-side con PHP, pero decidí no incluirlo en el proyecto ya que podía traer problemas de compatibilidad. 

Ojalá les sirva de algo!

------------------------------------------------------------------------------------------------------

Hi there! This is a super basic form in PHP which integrates MercadoPago's Checkout Pro. On my initial project, I had trouble submitting information
vía e-mail to my client after the payment was made, so I was able to solve it with this piece of code and wanted to share it.

It is important that you install both the MercadoPago SDK and PHPMailer for it to work, you can use the code provided as a reference.

On the other hand, this is only compatible for debit / credit card payments, it is not possible to integrate MercadoPago's electronic wallet
(I already asked for it t.t)

The fields are sanitized in PHP but it is important that you add your own validations and error messages regarding the validations, I did it both in client side with JQuery and in server-side with PHP, but I decided not to include it in the project since it could bring compatibility problems.

Hopefully this can help you!
