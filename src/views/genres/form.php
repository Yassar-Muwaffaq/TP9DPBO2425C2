<div class="container">
  <h2><?= isset($genre['id']) ? 'Edit Genre' : 'Add Genre' ?></h2>
  <form method="post">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($genre['name'] ?? '') ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="?page=genres" class="btn btn-secondary">Cancel</a>
  </form>
</div>
