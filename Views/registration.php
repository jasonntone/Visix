<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Create your Account | Visix</title>
    <link rel="stylesheet" href="../visix/public/dist/css/forms.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <form class="form" method="POST" action="./registration/signup">
      <div class="title">Welcome</div>
      <div class="subtitle">Let's create your account!</div>
      <div class="input-container ic1">
        <input
          id="firstname"
          name="firstname"
          class="input"
          type="text"
          placeholder=" "
        />
        <div class="cut"></div>
        <label for="firstname" class="placeholder">First name</label>
      </div>
      <div class="input-container ic2">
        <input
          id="lastname"
          name="lastname"
          class="input"
          type="text"
          placeholder=" "
        />
        <div class="cut"></div>
        <label for="lastname" class="placeholder">Last name</label>
      </div>
      <div class="input-container ic2">
        <input
          id="password"
          name="password"
          class="input"
          type="password"
          placeholder=" "
        />
        <div class="cut"></div>
        <label for="password" class="placeholder">Password</label>
      </div>
      <div class="input-container ic2">
        <input
          id="password"
          name="confirm_password"
          class="input"
          type="password"
          placeholder=" "
        />
        <div class="cut"></div>
        <label for="password" class="placeholder">Confirm Password</label>
      </div>
      <br />
      <p>Already have an account ? <a href="./login">Log in here !</a></p>
      <button type="text" class="submit">submit</button>
    </form>
  </body>
</html>
