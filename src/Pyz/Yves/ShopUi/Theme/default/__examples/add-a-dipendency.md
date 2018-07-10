# ADD A DEPENDENCY

If you want to add your own dependencies to project (ie. recat, foundation, jquery, etc.)or if you want tu customise/add new dependencies for webpack (ie. file-loader), use npm.

```bash

npm install --save dependency-name # use this for your application dependencies
npm install --save-dev dev-dependency-name # use this for your webpack/tooling dependencies
```

All the dependencies are gonna be written in `./package.json` and `./package-lock.json` files.
