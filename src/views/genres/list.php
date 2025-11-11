<div style="margin:20px;">
  <h2>Game Store</h2>
  <nav style="margin-bottom: 10px;">
    <a href="?page=games">Games</a> |
    <a href="?page=developers">Developers</a> |
    <a href="?page=genres">Genres</a>
  </nav>

  <h3>Genres</h3>
  <a href="?page=genres&action=create">+ Add Genre</a>

  <table border="1" cellpadding="6" cellspacing="0">
    <tr><th>ID</th><th>Name</th><th>Action</th></tr>
    <?php foreach ($genres as $g): ?>
    <tr>
      <td><?= htmlspecialchars($g['id']) ?></td>
      <td><?= htmlspecialchars($g['name']) ?></td>
      <td>
        <a href="?page=genres&action=edit&id=<?= $g['id'] ?>">Edit</a> |
        <a href="?page=genres&action=delete&id=<?= $g['id'] ?>" onclick="return confirm('Delete this genre?')">Del</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
