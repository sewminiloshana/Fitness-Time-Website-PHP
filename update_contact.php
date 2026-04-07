from pathlib import Path

path = Path(r'C:\Users\Nidul\Fitness Time website\Fitness Time website\contact.php')
text = path.read_text()
old = "<?php if (!empty($card['body'])): ?>"
new = "<?php if (!empty($card['body'] ?? '')): ?>"
if old not in text:
    raise SystemExit('pattern not found in contact.php')
text = text.replace(old, new, 1)
path.write_text(text)
