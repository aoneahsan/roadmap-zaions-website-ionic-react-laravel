/**
 * Core Imports go down
 * ? Like Import of React is a Core Import
 * */
import React from 'react';

/**
 * Packages Imports go down
 * ? Like import of ionic components is a packages import
 * */

/**
 * Custom Imports go down
 * ? Like import of custom components is a custom import
 * */
import {
	ZIonButton,
	ZIonChip,
	ZIonCol,
	ZIonContent,
	ZIonGrid,
	ZIonHeader,
	ZIonIcon,
	ZIonRow,
	ZIonSegment,
	ZIonSegmentButton,
	ZIonSelect,
	ZIonSelectOption,
	ZIonText,
	ZIonTitle,
} from '@/components/ZIonComponents';
import ZIonPage from '@/components/ZIonPage';
import classNames from 'classnames';
import ZaionsRSelect from '@/components/CustomComponents/ZaionsRSelect';
import {
	arrowBackOutline,
	carSportOutline,
	chatbubblesOutline,
	chevronDownOutline,
	chevronUpOutline,
	clipboardOutline,
	fileTrayStackedOutline,
} from 'ionicons/icons';
import ZRTooltip from '@/components/CustomComponents/ZRTooltip';
import { useZMediaQueryScale } from '@/ZaionsHooks/ZGenericHooks';
import ZUserAvatarButton from '@/components/WorkspacesComponents/UserButton';

/**
 * Custom Hooks Imports go down
 * ? Like import of custom Hook is a custom import
 * */

/**
 * Global Constants Imports go down
 * ? Like import of Constant is a global constants import
 * */

/**
 * Type Imports go down
 * ? Like import of type or type of some recoil state or any external type import is a Type import
 * */

/**
 * Recoil State Imports go down
 * ? Import of recoil states is a Recoil State import
 * */

/**
 * Style files Imports go down
 * ? Import of style sheet is a style import
 * */

/**
 * Images Imports go down
 * ? Import of images like png,jpg,jpeg,gif,svg etc. is a Images Imports import
 * */

/**
 * Component props type go down
 * ? Like if you have a type for props it should be please Down
 * */

/**
 * Functional Component
 * About: (Info of component here...)
 * @type {*}
 * */

const ZRoadMap: React.FC = () => {
	const { isMdScale, isSmScale } = useZMediaQueryScale();

	return (
		<ZIonPage>
			{/* Content */}
			<ZIonContent color='light'>
				{/* Setting the layout in a way if order to add menu can add easily. */}
				<ZIonGrid className='ion-no-padding h-full mb-5'>
					<ZIonRow className='h-full'>
						{/* in wanna add menu add below. */}

						{/*  */}
						<ZIonCol
							sizeXl='12'
							sizeLg='12'
							sizeMd='12'
							sizeSm='12'
							sizeXs='12'
							className='h-full zaions-ion-bg-color-light'
						>
							<ZIonGrid
								className={classNames({
									'h-full ion-no-padding': true,
									// 'mt-2': !isLgScale,
								})}
							>
								{/* in wanna add top bar add below. */}

								{/*  */}
								<ZIonRow className='ion-justify-content-center py-[2.3rem]'>
									<ZCommentsTab />
								</ZIonRow>
							</ZIonGrid>
						</ZIonCol>
					</ZIonRow>
				</ZIonGrid>
			</ZIonContent>
		</ZIonPage>
	);
};

const ZCommentsTab: React.FC = () => {
	return (
		<>
			<ZIonCol
				sizeXl='7'
				sizeLg='8.5'
				sizeMd='10'
				sizeSm='11'
				sizeXs='12'
				className={classNames({
					'ion-padding flex ion-justify-content-start ion-align-items-center zaions__bg_white rounded-t-lg shadow-md border-b gap-2':
						true,
					// 'flex-col': !isMdScale,
				})}
			>
				<ZIonIcon icon={arrowBackOutline} className='w-6 h-6' />
				<ZIonText className='text-lg'>Some Content</ZIonText>
			</ZIonCol>

			<ZIonCol
				sizeXl='7'
				sizeLg='8.5'
				sizeMd='10'
				sizeSm='11'
				sizeXs='12'
				className='ion-no-padding zaions__bg_white rounded-b-lg shadow-md  border-b overflow-hidden' //flex ion-justify-content-between
			>
				<ZIonText className='block py-2 ps-5 pe-2'>
					Frequently asked request. Please upvote or downvote to share your
					thoughts.
				</ZIonText>

				<ZIonText className='block ps-5 pe-2 text-lg'>Comments</ZIonText>

				<ZIonGrid className='ion-no-padding'>
					{[1, 2].map((el, index) => {
						return (
							<ZIonRow
								className='hover:z_ion_medium_point_1 p-2 ion-align-items-center ps-3 border-b'
								key={index}
							>
								<ZIonCol
									size='max-content'
									sizeXl='max-content'
									sizeLg='max-content'
									sizeMd='max-content'
									sizeSm='max-content'
									sizeXs='max-content'
								>
									<div className='w-[3rem] h-[2rem] text-lg flex ion-align-items-center ion-justify-content-center zaions__primary_bg rounded-md'>
										<ZIonIcon
											icon={carSportOutline}
											color='light'
											className='w-6 h-6'
										/>
									</div>
								</ZIonCol>

								<ZIonCol className='ms-2 flex ion-align-items-center'>
									<ZUserAvatarButton
										style={{ height: '45px', width: '45px' }}
									/>
									<div className='ms-2 w-[94%]'>
										<ZIonText className='block font-semibold'>
											User name here
										</ZIonText>
										<div className='overflow-hidden line-clamp-2'>
											<ZIonText className='block text-sm'>
												Lorem ipsum, dolor sit amet consectetur adipisicing
												elit. Delectus deleniti voluptatibus aperiam quo saepe
												repellendus voluptates consequuntur sed assumenda
												quaerat quae dolorem rerum accusantium incidunt iusto
												soluta laboriosam, sunt itaque?
											</ZIonText>
										</div>
									</div>
								</ZIonCol>
							</ZIonRow>
						);
					})}
				</ZIonGrid>
			</ZIonCol>
		</>
	);
};

const ZQuestionsList: React.FC = () => {
	const { isMdScale, isSmScale } = useZMediaQueryScale();

	return (
		<>
			<ZIonCol
				sizeXl='7'
				sizeLg='8.5'
				sizeMd='10'
				sizeSm='11'
				sizeXs='12'
				className={classNames({
					'ion-padding flex ion-justify-content-between zaions__bg_white rounded-t-lg shadow-md border-b':
						true,
					'flex-col': !isMdScale,
				})}
			>
				<ZIonSegment
					value='all'
					color='tertiary'
					scrollable
					className={classNames({
						'auto-cols-max ion-justify-content-start': true,
						'order-2': !isMdScale,
					})}
				>
					{/* All */}
					<ZIonSegmentButton
						value='all'
						className='min-w-max min-h-[2rem] me-1'
						style={{
							'--padding-end': '10px',
							'--padding-start': '10px',
						}}
					>
						All
					</ZIonSegmentButton>

					{/* Need feedback */}
					<ZIonSegmentButton
						value='need-feedback'
						className='min-w-max min-h-[2rem] me-1'
						style={{
							'--padding-end': '10px',
							'--padding-start': '10px',
						}}
					>
						Need feedback
					</ZIonSegmentButton>

					{/* Next */}
					<ZIonSegmentButton
						value='next'
						className='min-w-max min-h-[2rem] me-1'
						style={{
							'--padding-end': '10px',
							'--padding-start': '10px',
						}}
					>
						Next
					</ZIonSegmentButton>

					{/* In progress */}
					<ZIonSegmentButton
						value='inprogress'
						className='min-w-max min-h-[2rem] me-1'
						style={{
							'--padding-end': '10px',
							'--padding-start': '10px',
						}}
					>
						In progress
					</ZIonSegmentButton>

					{/* Complete */}
					<ZIonSegmentButton
						value='complete'
						className='min-w-max min-h-[2rem]'
						style={{
							'--padding-end': '10px',
							'--padding-start': '10px',
						}}
					>
						Complete
					</ZIonSegmentButton>
				</ZIonSegment>

				<ZIonSelect
					toggleIcon=''
					expandedIcon=''
					minHeight='2rem'
					fill='outline'
					interface='popover'
					className={classNames({
						'w-[13rem]': isMdScale,
						'order-1 mb-1 w-full': !isMdScale,
					})}
					value='most-recent'
				>
					<ZIonSelectOption value='most-recent'>Most recent</ZIonSelectOption>
					<ZIonSelectOption value='most-voted'>Most voted</ZIonSelectOption>
				</ZIonSelect>
			</ZIonCol>

			{/*  */}
			<ZIonCol
				sizeXl='7'
				sizeLg='8.5'
				sizeMd='10'
				sizeSm='11'
				sizeXs='12'
				className='ion-no-padding flex ion-justify-content-between zaions__bg_white rounded-b-lg shadow-md  border-b overflow-hidden'
			>
				<ZIonGrid className='ion-no-padding'>
					{[...Array(5)].map((el, index) => {
						return (
							<ZIonRow className='hover:z_ion_medium_point_1 p-2' key={index}>
								{/* urgent, yes, mah, buttons col */}
								<ZIonCol
									size='max-content'
									sizeXl='max-content'
									sizeLg='max-content'
									sizeMd='max-content'
									sizeSm='12'
									sizeXs='12'
									className={classNames({
										flex: isSmScale,
										'flex-col': isMdScale,
										'ion-justify-content-between': !isMdScale,
									})}
								>
									{/* Urgent button */}
									<ZIonButton
										expand={!isSmScale ? 'block' : undefined}
										id={`z-rm-argent-btn-${index}`}
										fill='clear'
										color='dark'
									>
										<ZIonIcon icon={carSportOutline} slot='icon-only' />
										{!isMdScale ? (
											<ZIonText className='ms-1'>Urgent</ZIonText>
										) : null}
									</ZIonButton>
									<ZRTooltip
										anchorSelect={`#z-rm-argent-btn-${index}`}
										content='Urgent'
										place='left'
										className='z-10'
									/>

									{/* Yes button */}
									<ZIonButton
										expand={!isSmScale ? 'block' : undefined}
										id={`z-rm-yes-btn-${index}`}
										fill='clear'
										color='dark'
									>
										<ZIonIcon icon={chevronUpOutline} slot='icon-only' />
										{!isMdScale ? (
											<ZIonText className='ms-1'>Yes</ZIonText>
										) : null}
									</ZIonButton>
									<ZRTooltip
										anchorSelect={`#z-rm-yes-btn-${index}`}
										content='Yes'
										place='left'
										className='z-10'
									/>

									{/* Meh button */}
									<ZIonButton
										expand={!isSmScale ? 'block' : undefined}
										id={`z-rm-meh-btn-${index}`}
										fill='clear'
										color='dark'
									>
										<ZIonIcon icon={chevronDownOutline} slot='icon-only' />
										{!isMdScale ? (
											<ZIonText className='ms-1'>Meh</ZIonText>
										) : null}
									</ZIonButton>
									<ZRTooltip
										anchorSelect={`#z-rm-meh-btn-${index}`}
										content='Meh'
										place='left'
										className='z-10'
									/>
								</ZIonCol>

								{/* Separator-1 */}
								<ZIonCol
									size='max-content'
									sizeXl='max-content'
									sizeLg='max-content'
									sizeMd='max-content'
									sizeSm='12'
									sizeXs='12'
								>
									<div
										className={classNames({
											zaions__medium_set: true,
											'h-full w-[0.1rem] mx-2': isMdScale,
											'h-[0.1rem] w-full my-1': !isMdScale,
										})}
									></div>
								</ZIonCol>

								{/* Tag, title, content Col */}
								<ZIonCol className='flex ion-justify-content-between flex-col cursor-pointer'>
									<div className=''>
										<ZIonTitle className='ion-no-padding overflow-hidden line-clamp-1'>
											<ZIonChip color='secondary'>In Progress</ZIonChip>
											<ZIonText className='ms-1' color='dark'>
												Some Content
											</ZIonText>
										</ZIonTitle>

										<div className='overflow-hidden line-clamp-2'>
											<ZIonText
												className='mt-1 text-sm ms-1 block'
												color='dark'
											>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit. Nostrum officiis architecto ut odio recusandae
												culpa nobis, nam saepe eum, fuga doloribus voluptate
												iste? Ea nihil repellendus error blanditiis ut deserunt!
											</ZIonText>
										</div>
									</div>

									<div className='mt-1'>
										<ZIonText className='block'>
											<ZIonText className='me-1 text-sm' color='dark'>
												Target Release
											</ZIonText>
											<ZIonChip>May 2023</ZIonChip>
										</ZIonText>
									</div>
								</ZIonCol>

								{/* Separator-2 */}
								<ZIonCol
									size='max-content'
									sizeXl='max-content'
									sizeLg='max-content'
									sizeMd='max-content'
									sizeSm='12'
									sizeXs='12'
								>
									<div
										className={classNames({
											zaions__medium_set: true,
											'h-full w-[0.17rem] mx-2': isMdScale,
											'h-[0.06rem] w-full my-1': !isMdScale,
										})}
									></div>
								</ZIonCol>

								{/* votes-summary, comments, timelog buttons col */}
								<ZIonCol
									size='max-content'
									sizeXl='max-content'
									sizeLg='max-content'
									sizeMd='max-content'
									sizeSm='12'
									sizeXs='12'
									className={classNames({
										flex: isSmScale,
										'flex-col': isMdScale,
										'ion-justify-content-between': !isMdScale,
									})}
								>
									{/* Vote-summary button */}
									<ZIonButton
										expand={!isSmScale ? 'block' : undefined}
										id={`z-rm-voted-summary-btn-${index}`}
										fill='clear'
										color='dark'
										className='z-10'
									>
										+234
										{!isMdScale ? (
											<ZIonText className='ms-1'>Votes</ZIonText>
										) : null}
									</ZIonButton>
									<ZRTooltip
										anchorSelect={`#z-rm-voted-summary-btn-${index}`}
										content='Votes summary'
										place='left'
									/>

									{/* Comments button */}
									<ZIonButton
										expand={!isSmScale ? 'block' : undefined}
										id={`z-rm-comments-btn-${index}`}
										fill='clear'
										color='dark'
										className='z-10'
									>
										<ZIonIcon icon={chatbubblesOutline} slot='icon-only' />
										{!isMdScale ? (
											<ZIonText className='ms-1'>Comments</ZIonText>
										) : null}
									</ZIonButton>
									<ZRTooltip
										anchorSelect={`#z-rm-comments-btn-${index}`}
										content='Comments'
										place='left'
									/>

									{/* Timelog button */}
									<ZIonButton
										expand={!isSmScale ? 'block' : undefined}
										id={`z-rm-timelog-btn-${index}`}
										fill='clear'
										color='dark'
										className='z-10'
									>
										<ZIonIcon icon={clipboardOutline} slot='icon-only' />
										{!isMdScale ? (
											<ZIonText className='ms-1'>Timelog</ZIonText>
										) : null}
									</ZIonButton>
									<ZRTooltip
										anchorSelect={`#z-rm-timelog-btn-${index}`}
										content='Timelog'
										place='left'
									/>
								</ZIonCol>
							</ZIonRow>
						);
					})}

					{/* <ZIonRow className='px-2 py-5'>
												<ZIonCol
													size='12'
													className='flex flex-col ion-align-items-center ion-justify-content-center'
												>
													<ZIonIcon
														icon={fileTrayStackedOutline}
														className='w-10 h-10'
													/>
													<ZIonText className='ion-no-padding text-lg mt-1'>
														No questions found!
													</ZIonText>
												</ZIonCol>
											</ZIonRow> */}
				</ZIonGrid>
			</ZIonCol>
		</>
	);
};

export default ZRoadMap;
