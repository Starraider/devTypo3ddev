module.exports = {
  extends: ["@commitlint/config-conventional"],
  rules: {
    "header-max-length": [0, "always", 72],
    "type-enum": [
      "[FEATURE]",
      "[BUGFIX]",
      "[DOCS]",
      "[TASK]",
      "[!!!]",
      "[SECURITY]",
    ],
    "type-case": "upper-case",
    "type-empty": "never",
  },
};
