<form action="#" method="POST" name="signup-form">
    <h1 class="text-center">Sign-up</h1>

    <!-- Error message -->
    <p class="text-center m-4">
    <div class="text-center">
        <ul class="list-group list-group-flush">
            <?php if (isset($templateParams["signuperror"])): ?>
                <p>
                    <?php echo $templateParams["signuperror"]; ?>
                </p>
            <?php endif; ?>
            </p>
            <!-- Successfull message -->
            <?php if (isset($templateParams["successfullsignup"])): ?>
                <p>
                    <?php echo $templateParams["successfullsignup"]; ?>
                </p>
            <?php endif; ?>
        </ul>
    </div>

    <!-- Credentials input -->
    <div class="mb-4 mt-4">
        <div class="form-outline p-2">
            <label hidden for="email">Email</label><input type="email" class="form-control" name="email" id="email"
                placeholder="yourmail@mail.com" required>
        </div>

        <div class="form-outline p-2">
            <label hidden for="username">Username</label><input type="text" class="form-control" name="username"
                id="username" placeholder="username" required>
        </div>

        <div class="form-outline p-2">
            <label hidden for="password1">Password</label><input type="password" class="form-control" name="password1"
                id="password1" placeholder="new password" required>
        </div>

        <div class="form-outline p-2">
            <label hidden for="password2">Password repeated</label> <input type="password" class="form-control"
                name="password2" id="password2" placeholder="repeat password" required>
        </div>
    </div>

    <!-- Submit buttons -->
    <div class="d-flex justify-content-end">
        <input class="form-btn align-right p-2 m-2 rounded" type="button" name="login-button" value="Back to log-in"
            onClick="location.href='index.php'"></input>
        <input class="form-btn align-right p-2 m-2 rounded" type="submit" name="signup-submit" value="Sign up" />
    </div>
</form>