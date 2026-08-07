import schema from "./schema.js";
import settings from "./settings.js";
import styles from "./styles.js";
import custom_templates from "./custom-templates.js";
import patterns from "./patterns.js";
import template_parts from "./template-parts.js";
import * as fs from 'fs';

const theme = {
  ...schema,
  settings: settings,
  styles: styles,
  // custom_templates: custom_templates,
  // patterns: patterns,
  // template_parts: template_parts
}

const json = JSON.stringify(theme)

fs.writeFileSync('theme.json', json)