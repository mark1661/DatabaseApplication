<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Hello User!</h1>
    <p>This email contains a link that will reset your password!</p>
    <p>Link: {{url('/resetPassword/' . $email_token)}}</p>
  </body>
</html>
