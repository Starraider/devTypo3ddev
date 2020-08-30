module.exports = {
  extends: ["@commitlint/config-conventional", "@commitlint/parse"],
  parserPreset: {
    parserOpts: {
      headerPattern: /^(\[\w*\])?:\(?(\w*)\)?\s(.+)/,
      headerCorrespondence: ["type", "scope", "subject"],
    },
  },
  rules: {
    "type-enum": [
      2,
      "always",
      ["[FEATURE]", "[BUGFIX]", "[DOCS]", "[TASK]", "[SECURITY]"],
    ],
    "type-case": [2, "always", "upper-case"],
    "type-empty": [2, "never"],
    "header-max-length": [2, "always", 80],
    "subject-case": [2, "always", "sentence-case"],
    "subject-empty": [2, "never"],
    "subject-full-stop": [2, "never", "."],
    "body-leading-blank": [2, "always"],
    "body-max-line-length": [2, "always", 72],
    "footer-leading-blank": [2, "always"],
  },
};
