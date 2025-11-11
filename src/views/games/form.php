<?php
$isEdit = isset($game);
$actionUrl = $isEdit ? "?page=games&action=edit&id=" . $game['id'] : "?page=games&action=create";
?>

<h2><?= $isEdit ? 'Edit Game' : 'Add Game' ?></h2>

<form method="POST" action="<?= $actionUrl ?>">
  <div>
    <label>Title:</label><br>
    <input type="text" name="title" value="<?= $isEdit ? htmlspecialchars($game['title']) : '' ?>" required>
  </div>

  <div>
    <label>Developer:</label><br>
    <select name="developer_id" required>
      <option value="">-- Select Developer --</option>
      <?php foreach ($developers as $dev): ?>
        <option value="<?= $dev['id'] ?>" 
          <?= ($isEdit && $game['developer_id'] == $dev['id']) ? 'selected' : '' ?>>
          <?= htmlspecialchars($dev['name']) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div>
    <label>Genre:</label><br>
    <select name="genre_id" required>
      <option value="">-- Select Genre --</option>
      <?php foreach ($genres as $genre): ?>
        <option value="<?= $genre['id'] ?>" 
          <?= ($isEdit && $game['genre_id'] == $genre['id']) ? 'selected' : '' ?>>
          <?= htmlspecialchars($genre['name']) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div>
    <label>Release Year:</label><br>
    <input type="number" name="release_year" value="<?= $isEdit ? htmlspecialchars($game['release_year']) : '' ?>" required>
  </div>

  <div>
    <label>Rating:</label><br>
    <input type="number" name="rating" step="0.1" min="0" max="10" value="<?= $isEdit ? htmlspecialchars($game['rating']) : '' ?>" required>
  </div>

  <div>
    <label>Price (USD):</label><br>
    <input type="number" name="price" step="0.01" min="0" value="<?= $isEdit ? htmlspecialchars($game['price']) : '' ?>" required>
  </div>

  <br>
  <button type="submit"><?= $isEdit ? 'Update' : 'Add' ?> Game</button>
  <a href="?page=games">Cancel</a>
</form>
