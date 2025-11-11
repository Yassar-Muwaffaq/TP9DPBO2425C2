<div class="container">
  <h2><?= isset($developer['id']) ? 'Edit Developer' : 'Add Developer' ?></h2>
  <form method="post">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($developer['name'] ?? '') ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Country</label>
      <input type="text" name="country" class="form-control" value="<?= htmlspecialchars($developer['country'] ?? '') ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Founded Year</label>
      <input type="number" name="founded_year" class="form-control" value="<?= htmlspecialchars($developer['founded_year'] ?? '') ?>" min="1970" max="<?=date('Y')?>">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="?page=developers" class="btn btn-secondary">Cancel</a>
  </form>
</div>
