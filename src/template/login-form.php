<form action="#" method="POST" name="login-form">
    <h1 class="text-center">Login</h1>

    <!-- Error message -->
    <p class="text-center m-4">
    <?php if(isset($templateParams["errorelogin"])): ?>
    <p><?php echo $templateParams["errorelogin"]; ?></p>
    <?php endif; ?>
    </p>

    <!-- Credentials input -->
    <div class="mb-4 mt-4">
        <div class="form-outline p-2">
            <!--<label for="email">E-mail</label>-->
            <input type="email" class="form-control" name="email" id="email" placeholder="yourmail@mail.com">
        </div>

        <div class="form-outline p-2">
            <!--<label for="password">Password</label>-->
            <input type="password" class="form-control" name="password" id="password" placeholder="password">
        </div>
    </div>

    <!-- Submit buttons -->
    <div class="d-flex justify-content-end">
        <input class="form-btn align-right p-2 m-2" type="submit" name="submit" value="Sign in" />
        <input class="form-btn align-right p-2 m-2" type="submit" name="submit" value="Log in" />
    </div>
</form>