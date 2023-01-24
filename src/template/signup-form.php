<form action="#" method="POST" name="signup-form">
    <h1 class="text-center">Sign-up</h1>

    <!-- Error message -->
    <p class="text-center m-4">
    <?php if(isset($templateParams["signuperror"])): ?>
    <p><?php echo $templateParams["signuperror"]; ?></p>
    <?php endif; ?>
    </p>

    <!-- Credentials input -->
    <div class="mb-4 mt-4">
        <div class="form-outline p-2">
            <input type="email" class="form-control" name="email" id="email" placeholder="yourmail@mail.com">
        </div>

        <div class="form-outline p-2">
            <input type="username" class="form-control" name="username" id="username" placeholder="username">
        </div>

        <div class="form-outline p-2">
            <input type="password" class="form-control" name="password1" id="password1" placeholder="new password">
        </div>

        <div class="form-outline p-2">
            <input type="password" class="form-control" name="password2" id="password2" placeholder="repeat password">
        </div>
    </div>

    <!-- Submit buttons -->
    <div class="d-flex justify-content-end">
        <input class="form-btn align-right p-2 m-2 rounded" type="submit" name="signup-submit" value="Sign up" />
        <input class="form-btn align-right p-2 m-2 rounded" type="button" name="login-button" value="Log in" onClick="location.href='index.php'"></input>
    </div>
</form>