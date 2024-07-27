export function getNestedValue(object, path) {
  if (!object || typeof path !== "string") return null;
  return path
    .split(".")
    .reduce(
      (obj, key) => (obj && obj[key] !== undefined ? obj[key] : null),
      object
    );
}

export function setNestedValue(object, path, value) {
  if (!object || typeof path !== "string") return;
  const keys = path.split(".");
  const lastKey = keys.pop();
  const lastObject = keys.reduce(
    (obj, key) => (obj[key] = obj[key] || {}),
    object
  );
  lastObject[lastKey] = value;
}
