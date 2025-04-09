<?php if (!empty($errors)): ?>
    <div style="color:red;">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<form method="POST" style="width:auto; max-width:600px; margin: 40px; border:1px solid gray; border-radius:25px; padding:25px">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= isset($users['name']) ? htmlspecialchars($users['name']) : '' ?>">
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?= isset($users['username']) ? htmlspecialchars($users['username']) : '' ?>">
    </div>
    <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input type="number" step=".01" class="form-control" id="age" name="age" value="<?= isset($users['age']) ? htmlspecialchars($users['age'])  : '' ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Gender</label><br>

        <input type="radio" id="male" name="gender" value="male"
            <?= isset($users['gender']) && $users['gender'] == 'male' ? 'checked' : '' ?>>
        <label for="male">Male</label>

        <input type="radio" id="female" name="gender" value="female"
            <?= isset($users['gender']) && $users['gender'] == 'female' ? 'checked' : '' ?>>
        <label for="female">Female</label>

    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>