<div class="container">
    <header class="img-side">
        <img src="./images/images.png" alt="image">
    </header>
    <main class="search-side">
        <form method="POST" class="mb-3" style="display: flex; align-items:center; justify-content:center; gap:15px">
            <input type="text" class="form-control" id="exampleInputEmail1" name="search" placeholder="Search">
            <button type="submit" class="btn btn-outline-primary">Search</button>
        </form>
    </main>
    <footer class="list-side">
        <h1>To-Do List</h1>
        <a href="/users/create" class="btn btn-outline-success">Add New User</a>
        <?php foreach ($users as $user): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" style="font-weight: 400;"><?= htmlspecialchars($user['id']) ?></th>
                        <td><?= htmlspecialchars($user['name']) ?></td>
                        <td><?= htmlspecialchars($user['username']) ?></td>
                        <td><?= htmlspecialchars($user['age']) ?></td>
                        <td><?= htmlspecialchars($user['gender']) ?></td>
                        <td>
                            <form method="POST" action="/users/delete"  style="display:flex; align-items:center; gap:5px">
                                <a href="/users/update?id=<?= $user['id'] ?>" class="btn btn-outline-primary btn-sm">Edit</a>
                                <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>" >
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php endforeach ?>
    </footer>
</div>