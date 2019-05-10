<?php

namespace MyApp\Tests\Unit\Application\Service\RentFilmService;

use MyApp\Application\Service\RentFilm\RentFilmCommand;
use MyApp\Application\Service\RentFilm\RentFilmService;
use MyApp\Domain\Model\Film\FilmId;
use MyApp\Domain\Model\Member\Member;
use MyApp\Domain\Model\Member\MemberId;
use MyApp\Domain\Model\Member\MemberRepository;
use MyApp\Domain\Model\Rental\Rental;
use MyApp\Domain\Model\Rental\RentalRepository;

class RentFilmServiceTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function should_persist_new_rental() {
        $memberId = MemberId::fromInt(123);
        $filmId = FilmId::fromInt(456);
        $rental = new Rental($memberId, $filmId);
        $rentalRepository = $this->prophesize(RentalRepository::class);
        $member = new Member($memberId);
        $memberRepository = $this->prophesize(MemberRepository::class);
        $memberRepository->findMemberById($memberId)->willReturn($member);

        $rentalRepository->saveRental($rental)->shouldBeCalled();

        $service = new RentFilmService($memberRepository->reveal(), $rentalRepository->reveal());
        $service->execute(new RentFilmCommand($memberId->int(), $filmId->int()));
    }
}
