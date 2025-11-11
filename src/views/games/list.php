<div style="margin:20px;">
  <h2>Game Store</h2>
  <nav style="margin-bottom: 10px;">
    <a href="?page=games">Games</a> |
    <a href="?page=developers">Developers</a> |
    <a href="?page=genres">Genres</a>
  </nav>

  <h3>Games</h3>
  <a href="?page=games&action=create">+ Add Game</a>

  <table border="1" cellpadding="6" cellspacing="0">
    <tr>
      <th>ID</th><th>Title</th><th>Developer</th><th>Genre</th><th>Year</th><th>Rating</th><th>Price</th><th>Action</th>
    </tr>
    <?php foreach ($games as $g): ?>
    <tr>
      <td><?= htmlspecialchars($g['id']) ?></td>
      <td><?= htmlspecialchars($g['title']) ?></td>
      <td><?= htmlspecialchars($g['developer']) ?></td>
      <td><?= htmlspecialchars($g['genre']) ?></td>
      <td><?= htmlspecialchars($g['release_year']) ?></td>
      <td><?= htmlspecialchars($g['rating']) ?></td>
      <td><?= htmlspecialchars($g['price']) ?></td>
      <td>
        <a href="?page=games&action=edit&id=<?= $g['id'] ?>">Edit</a> |
        <a href="?page=games&action=delete&id=<?= $g['id'] ?>" onclick="return confirm('Delete this game?')">Del</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
