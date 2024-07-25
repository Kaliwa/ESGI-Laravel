namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;

class GroupUserController extends Controller
{
    public function showAddUsersForm(Group $group)
    {
        // Récupérez tous les utilisateurs sauf ceux déjà membres du groupe
        $users = User::whereDoesntHave('groups', function($query) use ($group) {
            $query->where('group_id', $group->id);
        })->get();

        return view('groups.add_users', compact('group', 'users'));
    }

    public function addUsers(Request $request, Group $group)
    {
        // Validez les entrées
        $request->validate([
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id',
        ]);

        // Attachez les utilisateurs au groupe
        $group->users()->attach($request->input('user_ids'));

        return redirect()->route('groups.addUsers', $group->id)->with('success', 'Users added to the group successfully.');
    }
}
