import { mountList } from "./listLeagues.js";
import { handleLogin } from "./login.js";
import { handleSignup } from "./create.js";
import { handleJoingLeague } from "./joinLeague.js";
import { handleExitLeague } from "./exitLeague.js";
import { checkPlayingLeague } from "./checkPlayingLeague.js";

await checkPlayingLeague();
await mountList();
handleLogin();
handleSignup();
handleJoingLeague();
handleExitLeague();
