<div style="margin:20px;">
  <h2>Game Store</h2>
  <nav style="margin-bottom: 10px;">
    <a href="?page=games">Games</a> |
    <a href="?page=developers">Developers</a> |
    <a href="?page=genres">Genres</a>
  </nav>

  <h3>Developers</h3>
  <a href="?page=developers&action=create">+ Add Developer</a>

  <table border="1" cellpadding="6" cellspacing="0">
    <tr><th>ID</th><th>Name</th><th>Country</th><th>Action</th></tr>
    <?php foreach ($developers as $d): ?>
    <tr>
      <td><?= htmlspecialchars($d['id']) ?></td>
      <td><?= htmlspecialchars($d['name']) ?></td>
      <td><?= htmlspecialchars($d['country']) ?></td>
      <td>
        <a href="?page=developers&action=edit&id=<?= $d['id'] ?>">Edit</a> |
        <a href="?page=developers&action=delete&id=<?= $d['id'] ?>" onclick="return confirm('Delete this developer?')">Del</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
