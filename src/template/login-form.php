<form action="#" method="POST" name="login-form">
    <h1 class="text-center">Log-in</h1>

    <!-- Error message -->
    <p class="text-center m-4">
    <?php if(isset($templateParams["loginerror"])): ?>
    <p><?php echo $templateParams["loginerror"]; ?></p>
    <?php endif; ?>
    </p>

    <!-- Credentials input -->
    <div class="mb-4 mt-4">
        <div class="form-outline p-2">
            <label hidden for="email">Email</label><input type="email" class="form-control" name="email" id="email" placeholder="yourmail@mail.com" required>
        </div>

        <div class="form-outline p-2">
            <label hidden for="password">Password</label><input type="password" class="form-control" name="password" id="password" placeholder="password" required>
        </div>
    </div>

    <!-- Submit buttons -->
    <div class="d-flex justify-content-end">
        <input class="form-btn align-right p-2 m-2 rounded" type="button" name="signup-button" value="Sign up" onClick="location.href='signup.php'"></input>
        <input class="form-btn align-right p-2 m-2 rounded" type="submit" name="login-submit" value="Log in" />
    </div>
</form>