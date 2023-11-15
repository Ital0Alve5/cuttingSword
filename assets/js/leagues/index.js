import { mountList } from "./listLeagues.js";
import { handleLogin } from "./login.js";
import { handleSignup } from "./create.js";

await mountList();
handleLogin();
handleSignup();
