module.exports = {
  extends: "@commitlint/config-conventional",
  rules: {
    "type-enum": [
      2,
      "always",
      ["[FEATURE]", "[BUGFIX]", "[DOCS]", "[TASK]", "[SECURITY]", "[!!!]"],
    ],
    "type-case": [2, "always", "upper-case"],
    "type-empty": [2, "never"],
    "scope-empty": [2, "always"],
    "header-max-length": [2, "always", 52],
    "subject-case": [2, "always", "sentence-case"],
    "subject-empty": [2, "never"],
    "subject-full-stop": [2, "never", "."],
    "body-leading-blank": [1, "always"],
    "body-max-line-length": [2, "always", 72],
    "footer-leading-blank": [0, "always"]
  },
};
