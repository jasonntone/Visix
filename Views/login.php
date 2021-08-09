<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Create your Account | Visix</title>
    <link rel="stylesheet" href="../visix/public/dist/css/forms.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <form class="form" action="./login/signin">
      <div class="title">Hi !</div>
      <div class="subtitle">Log in to access your account !</div>
      <div class="input-container ic1">
        <input id="username" class="input" type="text" placeholder=" "  required="require"/>
        <div class="cut"></div>
        <label for="username" class="placeholder">Username</label>
      </div>
      <div class="input-container ic2">
        <input id="password" class="input" type="password" placeholder=" " required="require" />
        <div class="cut"></div>
        <label for="password" class="placeholder">Password</label>
      </div><br />
      <p>Don't have an account ? <a href="./registration">Sign up here !</a></p>
      <button type="text" class="submit">submit</button>
    </form>
  </body>
</html>