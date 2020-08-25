module.exports = {
  extends: ["@commitlint/config-conventional"],
  rules: {
    "type-enum": [
      "[FEATURE]",
      "[BUGFIX]",
      "[DOCS]",
      "[TASK]",
      "[!!!]",
      "[SECURITY]"
    ],
    "type-case": "upper-case",
    "type-empty": "never",
  },
};
