<?php



namespace App\Rules;

use App\Models\AwardingBody;
use Illuminate\Contracts\Validation\Rule;

class ValidateAwardingBodyName implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return  void
     */

    protected $id;
    protected $errMessage;

    public function __construct($id)
    {
        $this->id = $id;
        $this->errMessage = "";
    }


    /**
     * Determine if the validation rule passes.
     *
     * @param    string  $attribute
     * @param    mixed  $value
     * @return  bool
     */
    public function passes($attribute, $value)
    {
        $created_by  = NULL;
        if (auth()->user()->business) {
            $created_by = auth()->user()->business->created_by;
        }

        $data = AwardingBody::where("awarding_bodies.name", $value)
            ->when(!empty($this->id), function ($query) {
                $query->whereNotIn("id", [$this->id]);
            })
            ->when(empty(auth()->user()->business_id), function ($query) use ($created_by) {
                $query->when(auth()->user()->hasRole('superadmin'), function ($query) {
                    $query->forSuperAdmin('awarding_bodies');
                }, function ($query) use ($created_by) {
                    $query->forNonSuperAdmin('awarding_bodies', 'disabled_awarding_bodies', $created_by);
                });
            })
            ->when(!empty(auth()->user()->business_id), function ($query) use ($created_by) {
                $query->forBusiness('awarding_bodies', "disabled_awarding_bodies", $created_by);
            })

            ->first();

        if (!empty($data)) {

            if ($data->is_active) {
                $this->errMessage = "A awarding body with the same name already exists.";
            } else {
                $this->errMessage = "A awarding body with the same name exists but is deactivated. Please activate it to use.";
            }
            
            return 0;
        }
        return 1;
    }

    /**
     * Get the validation error message.
     *
     * @return  string
     */
    public function message()
    {
        return $this->errMessage;
    }
}
