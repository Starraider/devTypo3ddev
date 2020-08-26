module.exports = {
  extends: '@commitlint/config-conventional',
  rules: {
    'type-enum': [
      2,
      'always',
      ['[FEATURE]', '[BUGFIX]', '[DOCS]', '[TASK]', '[SECURITY]'],
    ],
    'type-case': 'upper-case',
    'type-empty': 'never',
  },
};
