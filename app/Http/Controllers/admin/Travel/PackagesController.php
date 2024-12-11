<?php

namespace App\Http\Controllers\BackEnd\Travel;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Category;
use App\Models\CategoryDestination;
use App\Models\CategoryPlace;
use App\Models\Country;
use App\Models\Destination;
use App\Models\Package;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $packages = Package::orderBy('created_at', 'desc')
                ->select('name', 'id', 'status', 'banner')
                ->get();

            return FacadesDataTables::of($packages)
                ->editColumn('thumbnail', function ($row) {
                    return '<img src="' . getImageurl($row->banner) . '" width="80">';
                })

                ->editColumn('status', function ($row) {
                    return $row->status == '1' ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Deactive</span>';
                })
                ->addColumn('action', function ($row) {
                    $html =
                        '<a href="' .
                        route('admin.categories-packages.edit', $row->id) .
                        '" class="btn btn-primary btn-sm pull-left m-r-10"><i class="fa fa-edit"></i>
                    </a>

                    <a href="' .
                        route('admin.categories-packages.delete', $row->id) .
                        '" class="btn btn-danger btn-sm delete_row" id="" ><i class="fa fa-trash"></i>
                    </a>


                    <a href="' .
                        route('admin.package.country', ['package_id' => $row->id]) .
                        '" class="btn btn-success btn-sm " id="" ><i class="fa fa-plus"></i>
                    </a>
                    <a href="' .
                    route('admin.package.gallery', ['package_id' => $row->id]) .
                    '" class="btn btn-info btn-sm " id="" ><i class="fa fa-images"></i>
                </a>'
                    ;

                    if ($row->status == 1) {
                        $html .= '<a href="' . route('admin.deactive', ['id' => $row->id, 'table' => 'packages']) . '" class="btn btn-primary btn-sm"><i class="fas fa-thumbs-down"></i></a>';
                    } else {
                        $html .= ' <a href="' . route('admin.active', ['id' => $row->id, 'table' => 'packages']) . '" class="btn btn-primary btn-sm"><i class="fas fa-thumbs-up"></i></a>';
                    }
                    return $html;
                })
                ->rawColumns(['action', 'status', 'thumbnail'])
                ->make(true);
        }
        return view('admin.packages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $featured_package = Package::where('status', 1)
            ->orderBy('name')
            ->get();
        $destinations = Destination::orderBy('name')->get();
        $categories_destinations = CategoryDestination::all();
        $places = CategoryPlace::orderBy('name')->get();
        return view('admin.packages.create', compact('destinations', 'categories_destinations', 'featured_package', 'places'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = $this->toAscii($request->name);
        $this->validate($request, [
            'name' => 'required|min:3|max:255|unique:packages',
            'destination_id' => 'required',
            'category_destination_id' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $package = new Package();
            $package->name = $request->name;
            $package->trip_id = $request->trip_id;

            // $package->category_id = ($request->category_id == "")? null : $request->category;;
            $package->destination_id = $request->destination_id;
            $package->category_place_id = $request->category_place_id ? $request->category_place_id : null;
            $package->category_destination_id = $request->category_destination_id;
            $package->status = 1;
            $package->duration = $request->duration;
            $package->difficulty = $request->difficulty;
            $package->max_altitude = $request->max_altitude;
            // $package->min_people_required = $request->min_people_required;
            $package->url = $request->url ? $request->url : $url;
            $package->outline_itinerary = $request->outline_itinerary;
            $package->detailed_itinerary = $request->detailed_itinerary;
            $package->include_exclude = $request->include_exclude;
            $package->trip_excludes = $request->trip_excludes;
            $package->useful_info = $request->useful_info;
            $package->equipment = $request->equipment;
            $package->order = $request->order;
            $package->activity = $request->activity;
            $package->meals = $request->meals;
            $package->room = $request->room;
            $package->transport = $request->transport;
            $package->best_month = $request->best_month;
            $package->group_size = $request->group_size;
            $package->faq = $request->faq;

            if ($request->price) {
                $package->price = $request->price;
            }
            $package->rating = $request->rating;
            if ($request->discounted_price) {
                $package->discounted_price = $request->discounted_price;
            }
            $package->overview = $request->overview;
            $package->important_notes = $request->important_notes;
            $package->physical_condition = $request->physical_condition;
            $package->additional_info = $request->additional_info;
            $package->slogan = $request->slogan;
            $package->arrival = $request->arrival;
            $package->departure_from = $request->departure_from;
            $package->fitness_level = $request->fitness_level;
            $package->page_title = $request->page_title;
            $package->meta_keywords = $request->meta_keywords;
            $package->meta_author = $request->meta_author;
            $package->meta_description = $request->meta_description;
            $package->video = $request->video;
            $package->mobile_meta_keyword = $request->mobile_meta_keyword;
            $package->mobile_meta_title = $request->mobile_meta_title;
            $package->mobile_meta_description = $request->mobile_meta_description;
            $package->map_title = $request->map_title;
            $package->circuit_title = $request->circuit_title;

            $banner = $request->file('thumbnail');
            if ($banner) {
                $package->banner = $this->uploadFile('upload/package/banner', $banner);
            }

            $thumbnail = $request->file('cover');
            if ($thumbnail) {
                $package->thumbnail = $this->uploadFile('upload/package/thumbnail', $thumbnail);
            }

            $roadmap = $request->file('roadmap');
            if ($roadmap) {
                $package->roadmap = $this->uploadFile('upload/package/roadmap', $roadmap);
            }

            $circuit_image = $request->file('circuit_image');
            if ($circuit_image) {
                $package->circuit_image = $this->uploadFile('upload/package/circuit_image', $circuit_image);
            }

            $package->save();

            if (isset($request->featured_package)) {
                foreach ($request->featured_package as $value) {
                    DB::table('package_featured')->insert(['package_id' => $package->id, 'featured_id' => $value]);
                }
            }

            DB::commit();
            $notification = [
                'alert-type' => 'success',
                'messege' => 'Successfully Added package.',
            ];

            Cache::forget('dealpackages');
            Cache::get('dealpackages', 604800, function () {
                return DB::table('packages')
                    ->orderBy('id', 'desc')
                    ->where('status', 1)
                    ->where('duration', '!=', null)
                    ->where('activity', '!=', null)
                    ->where('discounted_price', '!=', null)
                    ->paginate(24);
            });
        } catch (QueryException $e) {
            return $e->getMessage();
            DB::rollback();
            $notification = [
                'alert-type' => 'error',
                'messege' => 'Failed to Add package, Try again.',
            ];
        }

        return redirect()
            ->route('admin.categories-packages.index')
            ->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $featured_package = Package::where('status', 1)
            ->orderBy('name')
            ->get();
        $package = Package::findOrFail($id);
        $destinations = Destination::orderBy('name')->get();
        $places = CategoryPlace::orderBy('name')->get();

        $categories_destinations = CategoryDestination::orderBy('name')->get();
        return view('admin.packages.edit', compact('featured_package', 'package', 'destinations', 'categories_destinations', 'places'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $url = $this->toAscii($request->name);
        // $request['url'] = $url;
        // dd($request->all());

        $this->validate($request, [
            'name' => 'required|min:3|max:255|unique:packages,name,' . $id,
            'destination_id' => 'required',
            'category_destination_id' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $package = Package::findOrFail($id);
            $package->name = $request->name;
            $package->trip_id = $request->trip_id;

            // $package->category_id = ($request->category_id == "")? null : $request->category;;
            $package->destination_id = $request->destination_id;
            $package->category_place_id = $request->category_place_id ? $request->category_place_id : null;
            $package->category_destination_id = $request->category_destination_id;
            $package->status = 1;
            $package->duration = $request->duration;
            $package->difficulty = $request->difficulty;
            $package->max_altitude = $request->max_altitude;
            // $package->min_people_required = $request->min_people_required;
            $package->url = $request->url ? $request->url : $url;
            $package->overview = $request->overview;
            $package->outline_itinerary = $request->outline_itinerary;
            $package->detailed_itinerary = $request->detailed_itinerary;
            $package->include_exclude = $request->include_exclude;
            $package->trip_excludes = $request->trip_excludes;
            $package->useful_info = $request->useful_info;
            $package->equipment = $request->equipment;
            $package->order = $request->order;
            $package->activity = $request->activity;
            $package->meals = $request->meals;
            $package->room = $request->room;
            $package->transport = $request->transport;
            $package->best_month = $request->best_month;
            $package->group_size = $request->group_size;
            $package->faq = $request->faq;

            if ($request->price) {
                $package->price = $request->price;
            }
            $package->rating = $request->rating;
            if ($request->discounted_price) {
                $package->discounted_price = $request->discounted_price;
            }
            $package->overview = $request->overview;
            $package->important_notes = $request->important_notes;
            $package->physical_condition = $request->physical_condition;
            $package->additional_info = $request->additional_info;
            $package->slogan = $request->slogan;
            $package->arrival = $request->arrival;
            $package->departure_from = $request->departure_from;
            $package->fitness_level = $request->fitness_level;
            $package->video = $request->video;
            $package->page_title = $request->page_title;
            $package->meta_keywords = $request->meta_keywords;
            $package->meta_author = $request->meta_author;
            $package->meta_description = $request->meta_description;
            $package->mobile_meta_keyword = $request->mobile_meta_keyword;
            $package->mobile_meta_title = $request->mobile_meta_title;
            $package->mobile_meta_description = $request->mobile_meta_description;
            $package->map_title = $request->map_title;
            $package->circuit_title = $request->circuit_title;


            $banner = $request->file('thumbnail');
            if ($banner) {
                $this->deleteFile($package->banner);
                $package->banner = $this->uploadFile('upload/package/banner', $banner);
            }

            $thumbnail = $request->file('cover');
            if ($thumbnail) {
                $this->deleteFile($package->thumbnail);
                $package->thumbnail = $this->uploadFile('upload/package/thumbnail', $thumbnail);
            }

            $roadmap = $request->file('roadmap');
            if ($roadmap) {
                $this->deleteFile($package->routemap);
                $package->routemap = $this->uploadFile('upload/package/roadmap', $roadmap);
            }
            $circuit_image = $request->file('circuit_image');
            if ($circuit_image) {
                $this->deleteFile($package->circuit_image);
                $package->circuit_image = $this->uploadFile('upload/package/circuit_image', $circuit_image);
            }

            $package->save();
            if (isset($request->featured_package)) {
                foreach ($request->featured_package as $value) {
                    DB::table('package_featured')->insert(['package_id' => $package->id, 'featured_id' => $value]);
                }
            }
            DB::commit();
            $notification = [
                'alert-type' => 'success',
                'messege' => 'Successfully updated package.',
            ];
            Cache::forget('dealpackages');
            Cache::get('dealpackages', 604800, function () {
                return DB::table('packages')
                    ->orderBy('id', 'desc')
                    ->where('status', 1)
                    ->where('duration', '!=', null)
                    ->where('activity', '!=', null)
                    ->where('discounted_price', '!=', null)
                    ->paginate(24);
            });
        } catch (QueryException $e) {
            return $e->getMessage();
            DB::rollback();
            $notification = [
                'alert-type' => 'error',
                'messege' => 'Failed to updated package, Try again.',
            ];
        }

        return redirect()
            ->route('admin.categories-packages.index')
            ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $package = Package::findOrFail($id);
            $package->newimages()->detach();
            $package->homeimages()->detach();
            $package->routemapimages()->detach();
            $package->delete();
        } catch (QueryException $e) {
        }

        return redirect()->route('admin.packages.index');
    }

    // public function removeImage($id, Request $request) {
    //     $pacakge_image = PackageImage::findOrFail($id);
    //     $pacakge_image->deleteImage();
    //     $pacakge_image->delete();

    //     return response()->json(['status' => 'success']);
    // }

    private function toAscii($str)
    {
        $clean = preg_replace('~[^\\pL\d]+~u', '-', $str);
        $clean = strtolower(trim($clean, '-'));

        return $clean;
    }

    public function countryPackage(Request $request)
    {
        $package_id = $request->package_id;

        $packages = DB::table('country_package')
            ->join('countries', 'country_package.country_id', 'countries.id')
            ->join('packages', 'packages.id', 'country_package.package_id')
            ->select('country_package.*', 'packages.name as pname', 'countries.name as cname')
            ->where('package_id',$package_id)
            ->get();
        return view('admin.packages.country_package.index', compact('package_id', 'packages'));
    }

    public function countryPackagecreate(Request $request)
    {
        $package_id = $request->package_id;
        $countries = Country::all();
        return view('admin.packages.country_package.create', compact('package_id', 'countries'));
    }


    public function countryPackageStore(Request $request)
    {
        $package_id = $request->package_id;
        $insert = [
            'package_id' => $package_id,
            'name' => $request->name,
            'country_id' => $request->country,
            'overview' => $request->overview,
            'faq' => $request->faq,
            'outline_itinerary' => $request->outline_itinerary,
            'detailed_itinerary' => $request->detailed_itinerary,
            'include_exclude' => $request->include_exclude,
            'trip_excludes' => $request->trip_excludes,
            'useful_info' => $request->useful_info,
            'page_title' => $request->page_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_author' => $request->meta_author,
            'meta_description' => $request->meta_description,
            'mobile_meta_keyword' => $request->mobile_meta_keyword,
            'mobile_meta_title' => $request->mobile_meta_title,
            'mobile_meta_description' => $request->mobile_meta_description,
            'currency' => $request->currency,
            'price' => $request->price,
            'offer_price' => $request->offer_price,

        ];
        DB::table('country_package')->insert($insert);
        $notification = [
            'alert-type' => 'success',
            'messege' => 'updated succesfully',
        ];
        return redirect()->back()->with($notification);
    }


    public function countryPackageEdit($id)
    {
      $package=  DB::table('country_package')->where('id',$id)->first();
      $countries = Country::all();
        return view('admin.packages.country_package.edit', compact('package', 'countries'));
    }


    public function countryPackagupdate(Request $request)
    {
        $id=$request->id;
        $insert = [
            'name' => $request->name,
            'country_id' => $request->country,
            'overview' => $request->overview,
            'faq' => $request->faq,
            'outline_itinerary' => $request->outline_itinerary,
            'detailed_itinerary' => $request->detailed_itinerary,
            'include_exclude' => $request->include_exclude,
            'trip_excludes' => $request->trip_excludes,
            'useful_info' => $request->useful_info,
            'page_title' => $request->page_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_author' => $request->meta_author,
            'meta_description' => $request->meta_description,
            'currency' => $request->currency,
            'price' => $request->price,
            'offer_price' => $request->offer_price,
        ];
        DB::table('country_package')->where('id',$id)->update($insert);
        $notification = [
            'alert-type' => 'success',
            'messege' => 'updated succesfully',
        ];
        return redirect()->back()->with($notification);

    }


}
