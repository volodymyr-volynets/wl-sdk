<?php

namespace WellnessLiving\Wl\Login\Promotion;

use WellnessLiving\WlModelAbstract;

/**
 * An endpoint that manages or retrieves information about holds on Purchase Options.
 *
 * The DELETE method can remove a hold.
 * The GET method only returns information about active holds.
 * The POST method can create or edit a hold.
 * The PUT method can edit a hold.
 */
class PromotionPayPauseModel extends WlModelAbstract
{
  /**
   * The end date value indicating an indefinite pause period.
   */
  const DATE_END_INDEFINITE = '0000-00-00';

  /**
   * The end date of the current hold, in the local time zone. This can be set to a special value
   * {@link PromotionPayPauseModel::DATE_END_INDEFINITE} to make the period indefinite until further action.
   *
   * `null` if it shouldn't be updated.
   *
   * @get get,result
   * @post get
   * @put get
   * @var string|null
   */
  public $dt_end = null;

  /**
   * The start date of the current hold, in the local time zone.
   *
   * `null` if it shouldn't be updated.
   *
   * @get get,result
   * @post get
   * @put get
   * @var string|null
   */
  public $dt_start = null;

  /**
   * The Purchase Option key. If this key is used, a new hold will be created. The endpoint will return a ‘start-cross’
   * status code if a hold is already in place.
   *
   * Ignored if {@link $k_promotion_pay_pause} is provided.
   *
   * `null` if not yet initialized.
   *
   * @delete get
   * @get get,result
   * @post get
   * @var string|null
   */
  public $k_login_promotion = null;

  /**
   * The promotion payment hold key. If this key is used, it will edit an existing hold.
   * This key will be empty if there's no active hold in place or if a scheduled hold isn't in effect.
   *
   * `null` if not yet initialized or if the request is based on {@link $k_login_promotion}.
   *
   * @delete get
   * @get get,result
   * @post get,result
   * @put get,result
   * @var string|null
   */
  public $k_promotion_pay_pause = null;

  /**
   * Additional notes for the promotion payment pause period.
   * Leave this field as `null` if the note shouldn't be updated.
   *
   * `null` if it shouldn't be updated.
   *
   * @get result
   * @post post
   * @put post
   * @var string|null
   */
  public $text_note = null;
}

?>